<?php

use Botble\Base\Facades\BaseHelper;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Botble\Coaching\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {
        Route::group(['prefix' => 'coaching', 'as' => 'coachings.'], function () {
            Route::resource('', 'CoachingController')->except(['create', 'store'])->parameters(['' => 'coaching']);

            Route::delete('items/destroy', [
                'as' => 'deletes',
                'uses' => 'CoachingController@deletes',
                'permission' => 'coaching.destroy',
            ]);

            Route::post('reply/{id}', [
                'as' => 'reply',
                'uses' => 'CoachingController@postReply',
                'permission' => 'coaching.edit',
            ])->wherePrimaryKey();
        });
    });

    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {
        Route::post('coaching/send', [
            'as' => 'public.send.coaching',
            'uses' => 'PublicController@postSendCoaching',
        ]);
    });
});
