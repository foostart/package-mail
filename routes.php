<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 */
Route::get('mail', [
    'as' => 'mail',
    'uses' => 'Foostart\Mail\Controllers\Front\MailFrontController@index'
]);


/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see'],
                  'namespace' => 'Foostart\Mail\Controllers\Admin',
        ], function () {

        /*
          |-----------------------------------------------------------------------
          | Manage mail
          |-----------------------------------------------------------------------
          | 1. List of mails
          | 2. Edit mail
          | 3. Delete mail
          | 4. Add new mail
          | 5. Manage configurations
          | 6. Manage languages
          |
        */

        /**
         * list
         */
        Route::get('admin/mails/list', [
            'as' => 'mails.list',
            'uses' => 'MailAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/mails/edit', [
            'as' => 'mails.edit',
            'uses' => 'MailAdminController@edit'
        ]);

        /**
         * copy
         */
        Route::get('admin/mails/copy', [
            'as' => 'mails.copy',
            'uses' => 'MailAdminController@copy'
        ]);

        /**
         * post
         */
        Route::post('admin/mails/edit', [
            'as' => 'mails.post',
            'uses' => 'MailAdminController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/mails/delete', [
            'as' => 'mails.delete',
            'uses' => 'MailAdminController@delete'
        ]);

        /**
         * trash
         */
         Route::get('admin/mails/trash', [
            'as' => 'mails.trash',
            'uses' => 'MailAdminController@trash'
        ]);

        /**
         * configs
        */
        Route::get('admin/mails/config', [
            'as' => 'mails.config',
            'uses' => 'MailAdminController@config'
        ]);

        Route::post('admin/mails/config', [
            'as' => 'mails.config',
            'uses' => 'MailAdminController@config'
        ]);

        /**
         * language
        */
        Route::get('admin/mails/lang', [
            'as' => 'mails.lang',
            'uses' => 'MailAdminController@lang'
        ]);

        Route::post('admin/mails/lang', [
            'as' => 'mails.lang',
            'uses' => 'MailAdminController@lang'
        ]);

    });
});
