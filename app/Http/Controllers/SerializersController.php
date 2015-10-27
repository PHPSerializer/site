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
}
