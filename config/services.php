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

    'stripe' => [
        // 'model' => App\Models\User::class,
        // Userからadminに変更
        'model' => App\Models\Admin::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
        'plans' => [
           'free' => env('STRIPE_FREE_ID'),
           'start' => env('STRIPE_START_ID'),
           'business' => env('STRIPE_BUSINESS_ID'),
           'premium' => env('STRIPE_PREMIUM_ID')
        ],

        'planName' => [
            'price_1MwLojHsLNpqsMWsTjJITNTH' => '1ヵ月無料プラン',
            'price_1LHdYKHsLNpqsMWsn0s8P9Bj' => 'スタートプラン',
            'price_1LHzkgHsLNpqsMWsauumfYss' => 'ベーシックプラン',
            'price_1LHzlmHsLNpqsMWsD7epKTOb' => 'プレミアムプラン'

        ]
    ],

];
