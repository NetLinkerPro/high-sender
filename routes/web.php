<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::domain(config('high-sender.domain'))
    ->name('high-sender.')
    ->prefix(config('high-sender.prefix'))
    ->middleware(config('high-sender.middleware'))
    ->group(function () {

        # Assets AWES
        Route::get('assets/{module}/{type}/{filename}', config('high-sender.controllers.assets') . '@getAwes')->name('assets.awes');

        # Dashboard
        Route::prefix('/')->as('dashboard.')->group(function () {
            Route::get('/', config('high-sender.controllers.dashboard') . '@index')->name('index');
        });

        # SMTP accounts
        Route::prefix('smtp-accounts')->as('smtp_accounts.')->group(function () {
            Route::get('/', config('high-sender.controllers.smtp_accounts') . '@index')->name('index');
            Route::get('scope', config('high-sender.controllers.smtp_accounts') . '@scope')->name('scope');
            Route::post('store', config('high-sender.controllers.smtp_accounts') . '@store')->name('store');
            Route::patch('{id?}', config('high-sender.controllers.smtp_accounts') . '@update')->name('update');
            Route::delete('{id?}', config('high-sender.controllers.smtp_accounts') . '@destroy')->name('destroy');
        });

        # Test SMTP accounts
        Route::prefix('test-smtp-accounts')->as('test_smtp_accounts.')->group(function () {
            Route::post('test', config('high-sender.controllers.test_smtp_accounts') . '@sent')->name('sent');
        });
});




