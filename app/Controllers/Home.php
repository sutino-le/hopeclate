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


    public function menu(): string
    {
        // Menampilkan menu kategori Food
        $food           = 'Food';
        $beverages      = 'Beverages';

        $modelDaftarMenu = new ModelDaftarMenu();

        $data = [
            'kategorifood'              => $modelDaftarMenu->Food($food),
            'kategoribeverages'         => $modelDaftarMenu->Beverages($beverages),
        ];

        return view('dashboard/menu', $data);
    }


    public function about(): string
    {

        return view('dashboard/about');
    }


    public function contact(): string
    {

        return view('dashboard/contact');
    }


    public function login(): string
    {
        return view('login/index');
    }
}