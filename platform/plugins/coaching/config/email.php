<?php

return [
    'name' => 'plugins/coaching::coaching.settings.email.title',
    'description' => 'plugins/coaching::coaching.settings.email.description',
    'templates' => [
        'notice' => [
            'title' => 'plugins/coaching::coaching.settings.email.templates.notice_title',
            'description' => 'plugins/coaching::coaching.settings.email.templates.notice_description',
            'subject' => 'Message sent via your coaching form from {{ site_title }}',
            'can_off' => true,
            'variables' => [
                'coaching_name' => 'coaching name',
                'coaching_subject' => 'coaching subject',
                'coaching_email' => 'coaching email',
                'coaching_phone' => 'coaching phone',
                'coaching_address' => 'coaching address',
                'coaching_content' => 'coaching content',
            ],
        ],
    ],
];
