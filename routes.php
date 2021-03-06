<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 */
// Route::get('mail', [
//     'as' => 'mail',
//     'uses' => 'Foostart\Mail\Controllers\Front\MailFrontController@index'
// ]);
Route::get('team', [
    'as' => 'mails.team',
    'uses' => 'Foostart\Mail\Controllers\Front\TeamController@index'
]);


/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see']], function () {

        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////MailS ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        /**
         * list
         */
        Route::get('admin/mail', [
            'as' => 'admin_mail',
            'uses' => 'Foostart\Mail\Controllers\Admin\MailAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/mail/edit', [
            'as' => 'admin_mail.edit',
            'uses' => 'Foostart\Mail\Controllers\Admin\MailAdminController@edit'    
        ]);

        /**
         * post
         */
        Route::post('admin/mail/edit', [
            'as' => 'admin_mail.post',
            'uses' => 'Foostart\Mail\Controllers\Admin\MailAdminController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/mail/delete', [
            'as' => 'admin_mail.delete',
            'uses' => 'Foostart\Mail\Controllers\Admin\MailAdminController@delete'
        ]);

        /**
         * send mail
         */
        Route::get('admin/mail/mail_prepare', [
            'as' => 'admin_mail.mail_prepare',
            'uses' => 'Foostart\Mail\Controllers\Admin\MailAdminController@mailPrepare'
        ]);
        
        // GET SEND MAIL
        Route::post('admin/mail/send', [
            'as' => 'admin_mail.send',
            'uses' => 'Foostart\Mail\Controllers\Admin\MailAdminController@mailSend'
        ]);
        
         /**
         * send all mail
         */
        Route::get('admin/mail/sendAll', [
            'as' => 'admin_mail.sendAll',
            'uses' => 'Foostart\Mail\Controllers\Admin\MailAdminController@sendAll'
        ]);
        Route::get('admin/mails/search', [
            'as' => 'mails.search',
            'uses' => 'MailAdminController@search'
        ]);
    });
});
