<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function indexAction()
    {
        return view('pages/home');
    }

    public function documentationAction()
    {
        return view('pages/documentation');
    }
}
