<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class TransformersController extends BaseController
{
    /**
     * @return \Illuminate\View\View
     */
    public function arrayAction()
    {
        return view('pages/transformers/array');
    }
    /**
     * @return \Illuminate\View\View
     */
    public function flatArrayAction()
    {
        return view('pages/transformers/flat_array');
    }
    /**
     * @return \Illuminate\View\View
     */
    public function xmlAction()
    {
        return view('pages/transformers/xml');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function jsonAction()
    {
        return view('pages/transformers/json');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function yamlAction()
    {
        return view('pages/transformers/yaml');
    }

}
