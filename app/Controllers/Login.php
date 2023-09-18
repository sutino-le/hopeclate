<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLogin;

class Login extends BaseController
{
    public function index()
    {
        $userid = $this->request->getPost('userid');
        $password = $this->request->getPost('password');

        $validation = \Config\Services::validation();



        $valid = $this->validate([
            'userid'    => [
                'label'     => 'ID User',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'User/Password tidak boleh kosong'
                ]
            ],
            'password'    => [
                'label'     => 'Password',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'User/Password tidak boleh kosong'
                ]
            ]
        ]);


        if (!$valid) {
            $sessError = [
                'errIdUser'     => $validation->getError('userid'),
                'errIdUser'   => $validation->getError('password')
            ];

            session()->setFlashdata($sessError);
            return redirect()->to(site_url('/login'));
        } else {
            $modelLogin  = new ModelLogin();

            $cekUserLogin = $modelLogin->find($userid);
            if ($cekUserLogin == null) {
                $sessError = [
                    'errIdUser'     => 'Maaf user/password salah',
                ];

                session()->setFlashdata($sessError);
                return redirect()->to(site_url('/login'));
            } else {
                $passwordUser = $cekUserLogin['password'];

                if ($password = $passwordUser) {
                    //lanjutkan

                    $simpan_session = [
                        'userid'    => $userid,
                        'username'  => $cekUserLogin['username'],
                        'level'  => $cekUserLogin['level'],
                    ];
                    session()->set($simpan_session);

                    return redirect()->to('/main')->withInput()->with('validation', $validation);
                } else {
                    $sessError = [
                        'errIdUser'     => 'Maaf user/password salah',
                    ];

                    session()->setFlashdata($sessError);
                    return redirect()->to(site_url('/login'));
                }
            }
        }
    }



    public function keluar()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}