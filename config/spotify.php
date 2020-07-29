<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication
    |--------------------------------------------------------------------------
    |
    | The Client ID and Client Secret of your Spotify App.
    |
    */

    'auth' => [
        'client_id' => env('4a679d0b51584d9ba17f51dc7ace4062'),
        'client_secret' => env('cda795fc32944966abd215cbb8b929fa'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Config
    |--------------------------------------------------------------------------
    |
    | You may provide a default config which will be used for every API request.
    |
    */

    'default_config' => [
        'country' => env('SPOTIFY_DEFAULT_COUNTRY', ''),
        'locale' => env('SPOTIFY_DEFAULT_LOCALE', ''),
        'market' => env('SPOTIFY_DEFAULT_MARKET', ''),
    ],

];
