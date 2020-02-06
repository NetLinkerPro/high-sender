<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Owner
    |--------------------------------------------------------------------------
    |
    | Owner class for automation add owner to model.
    |
    */

    'owner' => [
      'model' => 'NetLinker\HighSender\Tests\Stubs\Owner',
      'field_auth_user_owner_uuid' => 'owner_uuid'
    ],


    /*
   |--------------------------------------------------------------------------
   | Domain
   |--------------------------------------------------------------------------
   |
   | Route domain for module HighSender. If null, domain will be
   | taken from `app.url` config.
   |
   */

    'domain' => null,

    /*
    |--------------------------------------------------------------------------
    | Prefix
    |--------------------------------------------------------------------------
    |
    | Route prefix for module HighSender.
    |
    */

    'prefix' => 'high-sender',


    /*
    |--------------------------------------------------------------------------
    | Web middleware
    |--------------------------------------------------------------------------
    |
    | Middleware for routes module HighSender. Value is array.
    |
    */

    'middleware' => ['web'],

    /*
    |--------------------------------------------------------------------------
    | Controllers
    |--------------------------------------------------------------------------
    |
    | Namespaces for controllers.
    |
    */

    'controllers' => [

        'assets' => 'NetLinker\HighSender\Sections\Assets\Controllers\AssetController',

        'dashboard' => 'NetLinker\HighSender\Sections\Dashboard\Controllers\DashboardController',

        'smtp_accounts' => 'NetLinker\HighSender\Sections\SmtpAccounts\Controllers\SmtpAccountController',

        'test_smtp_accounts' => 'NetLinker\HighSender\Sections\SmtpAccounts\Controllers\TestSmtpAccountController',

    ],

];