<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    /**
     * @return \Illuminate\View\View
     */
    public function indexAction()
    {
        return view('pages/home');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function documentationAction()
    {
        return view
        (
            'pages/documentation',
            [
                'navbar' => 'docs'
            ]
        );
    }

    /**
     * @return \Illuminate\View\View
     */
    public function downloadAction()
    {
        return view
        (
            'pages/download/download',
            [
                'navbar' => 'download'
            ]
        );
    }
}
