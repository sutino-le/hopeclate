<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelDaftarMenu;
use config\Services;

class DaftarMenu extends BaseController
{
    public function index()
    {

        $modelDaftarMenu = new ModelDaftarMenu();

        $data = [
            'menu'          => 'setting',
            'submenu'       => 'daftarmenu',
            'viewdata'      => $modelDaftarMenu->findAll(),
        ];
        return view('daftarmenu/viewdata', $data);
    }
    public function formtambah()
    {


        $data = [
            'menu'          => 'setting',
            'submenu'       => 'daftarmenu',
        ];
        return view('daftarmenu/formtambah', $data);
    }
}
