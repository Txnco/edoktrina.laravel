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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'google'=>[
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_CALLBACKS_REDIRECTS'),
    ],

    'openai' => [
        'api_key' => env('OPENAI_API_KEY'),
        'api_base' => env('OPENAI_API_BASE', 'https://api.openai.com/v1'),
        'api_version' => env('OPENAI_API_VERSION', '2023-05-15'),
        'api_type' => env('OPENAI_API_TYPE', 'openai'),
        'api_model' => env('OPENAI_API_MODEL', 'gpt-3.5-turbo'),
        'api_timeout' => env('OPENAI_API_TIMEOUT', 60),
    ]

];
