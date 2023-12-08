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
        'scheme' => 'https',
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
        'client_id' => '606376093948-73fickcuike8arolg0guj0nd6f3r4ird.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/auth/google/callback'
    ],

    'facebook' => [
        'client_id' => '706268974769871',
        'client_secret' => '3adb86f2784e99b4a73c9af4fd862e66',
        'redirect' => 'http://127.0.0.1:8000/auth/facebook/callback'
    ],

];
