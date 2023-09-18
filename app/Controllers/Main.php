<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Main extends BaseController
{
    public function index()
    {
        $data = [
            'menu'          => '',
            'submenu'       => '',
        ];
        return view('main/index', $data);
    }
}
