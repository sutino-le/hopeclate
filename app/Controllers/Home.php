<?php

namespace App\Controllers;

use App\Models\ModelDaftarMenu;

class Home extends BaseController
{
    public function index(): string
    {
        // Menampilkan menu kategori Food
        $food           = 'Food';
        $beverages      = 'Beverages';

        $modelDaftarMenu = new ModelDaftarMenu();

        $data = [
            'kategorifood'              => $modelDaftarMenu->Food($food),
            'kategoribeverages'         => $modelDaftarMenu->Beverages($beverages),
        ];

        return view('dashboard/index', $data);
    }


    public function login(): string
    {
        return view('login/index');
    }
}
