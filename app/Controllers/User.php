<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLogin;

class User extends BaseController
{
    public function index()
    {
        $modelUser = new ModelLogin();

        $data = [
            'menu'          => 'setting',
            'submenu'       => 'user',
            'viewdata'      => $modelUser->findAll(),
        ];
        return view('user/viewdata', $data);
    }


    public function formtambah()
    {
        $modelUser = new ModelLogin();

        $data = [
            'menu'          => 'setting',
            'submenu'       => 'user',
            'viewdata'      => $modelUser->findAll(),
        ];
        return view('user/formtambah', $data);
    }


    public function simpan()
    {

        $userid = $this->request->getPost('userid');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $validation = \Config\Services::validation();



        $valid = $this->validate([
            'userid'    => [
                'label'     => 'ID User',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'UserID tidak boleh kosong'
                ]
            ]
        ]);

        if (!$valid) {
            $sessError = [
                'errIdUser'     => $validation->getError('userid'),
            ];

            session()->setFlashdata($sessError);
            return redirect()->to(site_url('/usertambah'));
        } else {
            $modelLogin  = new ModelLogin();

            $cekUserLogin = $modelLogin->find($userid);
            if ($cekUserLogin > 0) {
                $sessError = [
                    'errIdUser'     => 'Maaf User ID sudah ada',
                ];

                session()->setFlashdata($sessError);
                return redirect()->to(site_url('/usertambah'));
            } else {
                $modelLogin->insert([
                    'userid'            => $userid,
                    'username'          => $username,
                    'password'          => $password,
                    'level'             => 1,
                ]);

                $data = [
                    'menu'          => 'setting',
                    'submenu'       => 'user',
                    'viewdata'      => $modelLogin->findAll(),
                ];
                return view('user/viewdata', $data);
            }
        }
    }


    public function hapus()
    {

        $userid = $this->request->getPost('userid');


        $validation = \Config\Services::validation();

        $modelUser = new ModelLogin();

        $modelUser->delete($userid);

        $sessError = [
            'errIdUser'     => 'User berhasil dihapus...',
        ];

        session()->setFlashdata($sessError);

        $data = [
            'menu'          => 'setting',
            'submenu'       => 'user',
            'viewdata'      => $modelUser->findAll(),
        ];
        return view('user/viewdata', $data);
    }



    public function formedit($id)
    {

        $modelUser = new ModelLogin();
        $dataUser = $modelUser->find($id);

        $data = [
            'menu'          => 'setting',
            'submenu'       => 'user',
            'userid'        => $dataUser['userid'],
            'username'      => $dataUser['username'],
            'password'      => $dataUser['password'],
        ];
        return view('user/formedit', $data);
    }



    public function editsimpan()
    {
        if ($this->request->isAJAX()) {
            $userid_lama    = $this->request->getPost('userid_lama');
            $userid         = $this->request->getPost('userid');
            $username       = $this->request->getPost('username');
            $password       = $this->request->getPost('password');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'userid' => [
                    'rules'     => 'required',
                    'label'     => 'User ID',
                    'errors'    => [
                        'required'  => '{field} tidak boleh kosong'
                    ]
                ],
                'username' => [
                    'rules'     => 'required',
                    'label'     => 'Nama',
                    'errors'    => [
                        'required'  => '{field} tidak boleh kosong'
                    ]
                ],
                'password' => [
                    'rules'     => 'required',
                    'label'     => 'Password',
                    'errors'    => [
                        'required'  => '{field} tidak boleh kosong'
                    ]
                ],
            ]);

            if (!$valid) {
                $json = [
                    'error' => [
                        'errUserID'       => $validation->getError('userid'),
                        'errUsername'     => $validation->getError('username'),
                        'errPassword'     => $validation->getError('password'),
                    ]
                ];
            } else if ($userid_lama != $userid) {
                $modelUser = new ModelLogin();
                $cekUser = $modelUser->find($userid);

                if ($cekUser > 0) {
                    $json = [
                        'error' => [
                            'errUserID'       => 'User ID sudah ada',
                        ]
                    ];
                } else {

                    $modelUser = new ModelLogin();

                    $modelUser->update($userid_lama, [
                        'userid'        => $userid,
                        'username'      => $username,
                        'password'      => $password,
                    ]);


                    $json = [
                        'sukses'        => 'Data berhasil dirubah'
                    ];
                }
            } else {
                $modelUser = new ModelLogin();
                $modelUser->update($userid_lama, [
                    'userid'        => $userid,
                    'username'      => $username,
                    'password'      => $password,
                ]);


                $json = [
                    'sukses'        => 'Data berhasil dirubah'
                ];
            }


            echo json_encode($json);
        }
    }
}