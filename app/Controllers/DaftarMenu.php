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



    public function simpan()
    {

        if ($this->request->isAJAX()) {
            $menunama         = $this->request->getPost('menunama');
            $menukategori       = $this->request->getPost('menukategori');
            $menuharga       = $this->request->getPost('menuharga');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'menunama' => [
                    'rules'     => 'required',
                    'label'     => 'Menu',
                    'errors'    => [
                        'required'  => '{field} tidak boleh kosong'
                    ]
                ],
                'menukategori' => [
                    'rules'     => 'required',
                    'label'     => 'Kategori',
                    'errors'    => [
                        'required'  => '{field} tidak boleh kosong'
                    ]
                ],
                'menuharga' => [
                    'rules'     => 'required',
                    'label'     => 'Harga',
                    'errors'    => [
                        'required'  => '{field} tidak boleh kosong'
                    ]
                ],
            ]);

            if (!$valid) {
                $json = [
                    'error' => [
                        'errMenu'       => $validation->getError('menunama'),
                        'errKategori'     => $validation->getError('menukategori'),
                        'errHarga'     => $validation->getError('menuharga'),
                    ]
                ];
            } else {


                $modelDaftarMenu = new ModelDaftarMenu();

                // update Foto


                $modelDaftarMenu->insert([
                    'menuid'            => '',
                    'menunama'          => $menunama,
                    'menukategori'      => $menukategori,
                    'menuharga'         => $menuharga,
                    'menufoto'          => '',
                    'penjualan'         => '0',
                    'rasa'              => '0',
                    'kebersihan'        => '0',
                    'pelayanan'         => '0',
                    'totalnilai'        => '0',
                ]);

                $json = [
                    'sukses'        => 'Data berhasil disimpan'
                ];
            }


            echo json_encode($json);
        }
    }


    public function formedit($id)
    {

        $modelDaftarMenu = new ModelDaftarMenu();
        $dataMenu = $modelDaftarMenu->find($id);

        $data = [
            'menu'          => 'setting',
            'submenu'       => 'daftarmenu',
            'menuid'            => $dataMenu['menuid'],
            'menunama'          => $dataMenu['menunama'],
            'menukategori'      => $dataMenu['menukategori'],
            'menuharga'         => $dataMenu['menuharga'],
        ];
        return view('daftarmenu/formedit', $data);
    }



    public function update()
    {

        if ($this->request->isAJAX()) {
            $menuid         = $this->request->getPost('menuid');
            $menunama         = $this->request->getPost('menunama');
            $menukategori       = $this->request->getPost('menukategori');
            $menuharga       = $this->request->getPost('menuharga');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'menunama' => [
                    'rules'     => 'required',
                    'label'     => 'Menu',
                    'errors'    => [
                        'required'  => '{field} tidak boleh kosong'
                    ]
                ],
                'menukategori' => [
                    'rules'     => 'required',
                    'label'     => 'Kategori',
                    'errors'    => [
                        'required'  => '{field} tidak boleh kosong'
                    ]
                ],
                'menuharga' => [
                    'rules'     => 'required',
                    'label'     => 'Harga',
                    'errors'    => [
                        'required'  => '{field} tidak boleh kosong'
                    ]
                ],
            ]);

            if (!$valid) {
                $json = [
                    'error' => [
                        'errMenu'       => $validation->getError('menunama'),
                        'errKategori'     => $validation->getError('menukategori'),
                        'errHarga'     => $validation->getError('menuharga'),
                    ]
                ];
            } else {


                $modelDaftarMenu = new ModelDaftarMenu();

                // update Foto


                $modelDaftarMenu->update($menuid, [
                    'menunama'          => $menunama,
                    'menukategori'      => $menukategori,
                    'menuharga'         => $menuharga,
                ]);

                $json = [
                    'sukses'        => 'Data berhasil dirubah'
                ];
            }


            echo json_encode($json);
        }
    }


    public function hapus($id)
    {
        $modelDaftarMenu = new ModelDaftarMenu();
        $datamenu = $modelDaftarMenu->find($id);


        $modelDaftarMenu->delete($id);

        $json = [
            'sukses' => 'Data berhasil dihapus...'
        ];


        echo json_encode($json);
    }


    public function uploadgambar($id)
    {

        $modelDaftarMenu = new ModelDaftarMenu();
        $dataMenu = $modelDaftarMenu->find($id);

        $data = [
            'menu'          => 'setting',
            'submenu'       => 'daftarmenu',
            'menuid'        => $dataMenu['menuid'],
            'menunama'      => $dataMenu['menunama'],
            'menufoto'      => $dataMenu['menufoto'],
        ];
        return view('daftarmenu/formupload', $data);
    }

    public function simpangambar()
    {

        $menuid         = $this->request->getPost('menuid');
        $menufoto       = $this->request->getFile('menufoto');

        $modelDaftarMenu = new ModelDaftarMenu();

        // update Foto
        if ($menufoto == "") {
            $fileGambarFoto = $menufoto->getRandomName();
        } else {
            $fileGambarFoto = $menufoto->getRandomName();

            $menufoto->move('upload', $fileGambarFoto);
        }

        $dataFoto = $modelDaftarMenu->find($menuid);

        if ($dataFoto['menufoto'] == "") {
        } else {
            unlink('upload/' . $dataFoto['menufoto']);
        }



        $modelDaftarMenu->update($menuid, [
            'menufoto'        => $fileGambarFoto,
        ]);


        $data = [
            'menu'          => 'setting',
            'submenu'       => 'daftarmenu',
            'viewdata'      => $modelDaftarMenu->findAll(),
        ];
        return view('daftarmenu/viewdata', $data);
    }
}
