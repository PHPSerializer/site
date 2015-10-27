<?php

$app->get(
    '/',
    ['as' => 'homepage', 'uses' => 'Controller@indexAction']
);

$app->get(
    '/docs',
    ['as' => 'docs', 'uses' => 'Controller@documentationAction']
);

$app->get(
    '/docs/serializers',
    ['as' => 'docs', 'uses' => 'SerializersController@indexAction']
);

$app->group(['prefix' => 'docs/transformers'], function(\Laravel\Lumen\Application $app) {
    $app->get(
        'array',
        ['as' => 'transformer', 'uses' => '\App\Http\Controllers\TransformersController@arrayAction']
    );

    $app->get(
        'flat-array',
        ['as' => 'transformer', 'uses' => '\App\Http\Controllers\TransformersController@flatArrayAction']
    );

    $app->get(
        'xml',
        ['as' => 'transformer', 'uses' => '\App\Http\Controllers\TransformersController@xmlAction']
    );

    $app->get(
        'json',
        ['as' => 'transformer', 'uses' => '\App\Http\Controllers\TransformersController@jsonAction']
    );

    $app->get(
        'yaml',
        ['as' => 'transformer', 'uses' => '\App\Http\Controllers\TransformersController@yamlAction']
    );
});

$app->group(['prefix' => 'docs/api'], function(\Laravel\Lumen\Application $app) {
    $app->get(
        'hal-json',
        ['as' => 'api_hal_json', 'uses' => '\App\Http\Controllers\ApiTransformersController@haljsonAction']
    );

    $app->get(
        'json-api-v1',
        ['as' => 'api_json_api', 'uses' => '\App\Http\Controllers\ApiTransformersController@jsonapiAction']
    );

    $app->get(
        'json',
        ['as' => 'api_json', 'uses' => '\App\Http\Controllers\ApiTransformersController@jsonAction']
    );

    $app->get(
        'jsend',
        ['as' => 'api_jsend', 'uses' => '\App\Http\Controllers\ApiTransformersController@jsendAction']
    );
});

