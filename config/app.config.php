<?php

return [
        'routes' =>
            [
                'GET' => [
                    '' => 'App\Controllers\CaractersController@getCaracters',
                    'caracters/:page' => 'App\Controllers\CaractersController@getCaracters',
                    'caracter/:id' => 'App\Controllers\CaractersController@show',
                    'auth/login'  => 'App\Controllers\LoginController@showLogin',
                    'auth/signup'  => 'App\Controllers\LoginController@showSignup',
                ],
                'POST' => [
                    'search-caracter' => 'App\Controllers\CaractersController@search',

                ]
            ]
        ];
