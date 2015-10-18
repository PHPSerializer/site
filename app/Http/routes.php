<?php


$app->get(
    '/',
    ['as' => 'homepage', 'uses' => 'Controller@indexAction']
);

$app->get(
    '/docs',
    ['as' => 'homepage', 'uses' => 'Controller@documentationAction']
);

$app->group(['prefix' => 'docs/api'], function($app) {
    $app->get(
        'hal-json',
        ['as' => 'homepage', 'uses' => '\App\Http\Controllers\ApiTransformersController@haljsonAction']
    );

    $app->get(
        'json-api-v1',
        ['as' => 'homepage', 'uses' => '\App\Http\Controllers\ApiTransformersController@jsonapiAction']
    );

    $app->get(
        'json',
        ['as' => 'homepage', 'uses' => '\App\Http\Controllers\ApiTransformersController@jsonAction']
    );

    $app->get(
        'jsend',
        ['as' => 'homepage', 'uses' => '\App\Http\Controllers\ApiTransformersController@jsendAction']
    );
});


$app->group(['prefix' => 'docs/serializers'], function($app) {


    $app->get(
        'json',
        ['as' => 'homepage', 'uses' => '\App\Http\Controllers\SerializersController@jsonAction']
    );


    $app->get(
        'xml',
        ['as' => 'homepage', 'uses' => '\App\Http\Controllers\SerializersController@xmlAction']
    );


    $app->get(
        'yaml',
        ['as' => 'homepage', 'uses' => '\App\Http\Controllers\SerializersController@yamlAction']
    );

});