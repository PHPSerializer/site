<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class SerializersController extends BaseController
{
    /**
     * @return \Illuminate\View\View
     */
    public function indexAction()
    {
        return view('pages/serializers/index');
    }



    /**
     * @return \Illuminate\View\View
     */
    public function jsonAction()
    {
        return view
        (
            'pages/serializers/json',
            [
                'navbar' => 'docs'
            ]
        );
    }

    /**
     * @return \Illuminate\View\View
     */
    public function xmlAction()
    {
        return view
        (
            'pages/serializers/xml',
            [
                'navbar' => 'docs'
            ]
        );
    }

    /**
     * @return \Illuminate\View\View
     */
    public function yamlAction()
    {
        return view
        (
            'pages/serializers/yaml',
            [
                'navbar' => 'docs'
            ]
        );
    }

    /**
     * @return \Illuminate\View\View
     */
    public function otherAction()
    {
        return view('pages/transformers/index');
    }

}
