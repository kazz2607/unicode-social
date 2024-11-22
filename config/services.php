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
    /** Cấu hình Đăng nhập Laravel Social */
    'facebook' => [
        'client_id' => '1255071672365154',
        'client_secret' => 'edd2cd5f6953d81412c3079af8f7e361',
        'redirect' => '/auth/facebook/callback',
    ],
    'google' => [
        'client_id' => '512018619033-0p7e3qsua4e9ehi8e0eb8l6bj3ocqp40.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => '/auth/google/callback',
    ],
    'github' => [
        'client_id' => 'Iv23lixq4tMy2UkRdK5p',
        'client_secret' => '1c9198d1b5d765c3de099b27985f387d7e738331',
        'redirect' => '/auth/github/callback',
    ],
];
