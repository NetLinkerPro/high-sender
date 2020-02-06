<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(\NetLinker\HighSender\Sections\SmtpAccounts\Models\SmtpAccount::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'host' => $faker->unique()->name,
        'port' => $faker->numberBetween(50, 200),
        'username' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
        'encryption' => 'tls',
        'from_name' => $faker->unique()->name,
        'from_address' =>  $faker->unique()->safeEmail,
    ];
});