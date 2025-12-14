<?php

namespace Botble\Coaching\Http\Controllers;

use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Coaching\Events\SentCoachingEvent;
use Botble\Coaching\Http\Requests\CoachingRequest;
use Botble\Coaching\Repositories\Interfaces\CoachingInterface;
use Botble\Base\Facades\EmailHandler;
use Exception;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class PublicController extends Controller
{
    public function __construct(protected CoachingInterface $coachingRepository)
    {
    }

    public function postSendCoaching(CoachingRequest $request, BaseHttpResponse $response)
    {
        $blacklistDomains = setting('blacklist_email_domains');

        if ($blacklistDomains) {
            $emailDomain = Str::after(strtolower($request->input('email')), '@');

            $blacklistDomains = collect(json_decode($blacklistDomains, true))->pluck('value')->all();

            if (in_array($emailDomain, $blacklistDomains)) {
                return $response
                    ->setError()
                    ->setMessage(__('Your email is in blacklist. Please use another email address.'));
            }
        }

        $blacklistWords = trim(setting('blacklist_keywords', ''));

        if ($blacklistWords) {
            $content = strtolower($request->input('content'));

            $badWords = collect(json_decode($blacklistWords, true))
                ->filter(function ($item) use ($content) {
                    $matches = [];
                    $pattern = '/\b' . $item['value'] . '\b/iu';

                    return preg_match($pattern, $content, $matches, PREG_UNMATCHED_AS_NULL);
                })
                ->pluck('value')
                ->all();

            if (count($badWords)) {
                return $response
                    ->setError()
                    ->setMessage(__('Your message contains blacklist words: ":words".', ['words' => implode(', ', $badWords)]));
            }
        }

        try {
            $coaching = $this->coachingRepository->getModel();
            $coaching->fill($request->input());
            $this->coachingRepository->createOrUpdate($coaching);

            event(new SentCoachingEvent($coaching));

            $args = [];

            if ($coaching->name && $coaching->email) {
                $args = ['replyTo' => [$coaching->name => $coaching->email]];
            }

            EmailHandler::setModule(COACHING_MODULE_SCREEN_NAME)
                ->setVariableValues([
                    'coaching_name' => $coaching->name ?? 'N/A',
                    'coaching_subject' => $coaching->subject ?? 'N/A',
                    'coaching_email' => $coaching->email ?? 'N/A',
                    'coaching_phone' => $coaching->phone ?? 'N/A',
                    'coaching_address' => $coaching->address ?? 'N/A',
                    'coaching_content' => $coaching->content ?? 'N/A',
                ])
                ->sendUsingTemplate('notice', null, $args);

            return $response->setMessage(__('Send message successfully!'));
        } catch (Exception $exception) {
            info($exception->getMessage());

            return $response
                ->setError()
                ->setMessage(__("Can't send message on this time, please try again later!"));
        }
    }
}
