<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '1197805130235636',
        'client_secret' => '58dccbcd6bca4718300977bff0319163',
        'redirect' => 'http://www.apprendiendo.co/loginwithfb'
    ],

    'google' => [
        'client_id' => '263640954054-8b75vq35u6i52nk934vvo81pblh6uf06.apps.googleusercontent.com',
        'client_secret' => 'zWU-IFFeGlLyKM4k83BWZLVA',
        'redirect' => 'http://www.apprendiendo.co/loginwithgoogle'
    ],
];
