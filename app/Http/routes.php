<?php


$app->get(
    '/',
    ['as' => 'homepage', 'uses' => 'Controller@indexAction']
);

$app->get(
    '/docs',
    ['as' => 'docs', 'uses' => 'Controller@documentationAction']
);

$app->group(['prefix' => 'docs/transformers'], function($app) {
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

$app->group(['prefix' => 'docs/api'], function($app) {
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


$app->group(['prefix' => 'docs/serializers'], function($app) {


    $app->get(
        'json',
        ['as' => 'serializers_homepage', 'uses' => '\App\Http\Controllers\SerializersController@jsonAction']
    );


    $app->get(
        'xml',
        ['as' => 'serializers_homepage', 'uses' => '\App\Http\Controllers\SerializersController@xmlAction']
    );


    $app->get(
        'yaml',
        ['as' => 'serializers_yaml', 'uses' => '\App\Http\Controllers\SerializersController@yamlAction']
    );

});