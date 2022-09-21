<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '301749209154-2564ivmngpgoaam0jdsl8fbntuspm39r.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://arikliger.com/auth/google/callback',
    ],

    'facebook' => [
        'client_id' => '399800382047564',
        'client_secret' => '25194238b9dda253d46602431677b166',
        'redirect' => 'https://arikliger.com/auth/facebook/callback',
    ],

    // 'google' => [
    //     'client_id' => env('GOOGLE_CLIENT_ID'),
    //     'client_secret' => env('GOOGLE_CLIENT_SECRET'),
    //     'redirect' => env('GOOGLE_CALLBACK_URL'),
    // ],

    // 'facebook' => [
    //     'client_id' => env('FACEBOOK_CLIENT_ID'),
    //     'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
    //     'redirect' => env('FACEBOOK_CALLBACK_URL'),
    // ],

];
