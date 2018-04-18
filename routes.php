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

    Route::group(['middleware' => ['admin_logged', 'can_see']], function () {

        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////SAMPLES ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        /**
         * list
         */
        Route::get('/admin/mail', [
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
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////SAMPLES ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////




        
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CATEGORIES///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
         Route::get('admin/mail_category', [
            'as' => 'admin_mail_category',
            'uses' => 'Foostart\Mail\Controllers\Admin\MailCategoryAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/mail_category/edit', [
            'as' => 'admin_mail_category.edit',
            'uses' => 'Foostart\Mail\Controllers\Admin\MailCategoryAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/mail_category/edit', [
            'as' => 'admin_mail_category.post',
            'uses' => 'Foostart\Mail\Controllers\Admin\MailCategoryAdminController@post'
        ]);
         /**
         * delete
         */
        Route::get('admin/mail_category/delete', [
            'as' => 'admin_mail_category.delete',
            'uses' => 'Foostart\Mail\Controllers\Admin\MailCategoryAdminController@delete'
        ]);
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CATEGORIES///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
    });
});
