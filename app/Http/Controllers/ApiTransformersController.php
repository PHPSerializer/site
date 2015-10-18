<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class ApiTransformersController extends BaseController
{
    /**
     * @return \Illuminate\View\View
     */
    public function indexAction()
    {
        return view('pages/api/index');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function haljsonAction()
    {
        return view
        (
            'pages/api/haljson',
            [
                'navbar' => 'docs'
            ]
        );
    }


    /**
     * @return \Illuminate\View\View
     */
    public function jsonapiAction()
    {
        return view
        (
            'pages/api/jsonapi',
            [
                'navbar' => 'docs'
            ]
        );
    }


    /**
     * @return \Illuminate\View\View
     */
    public function jsonAction()
    {
        return view
        (
            'pages/api/json',
            [
                'navbar' => 'docs'
            ]
        );
    }


    /**
     * @return \Illuminate\View\View
     */
    public function jsendAction()
    {
        return view
        (
            'pages/api/jsend',
            [
                'navbar' => 'docs'
            ]
        );
    }
}
