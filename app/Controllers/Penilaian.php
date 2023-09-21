<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBobot;
use App\Models\ModelDaftarMenu;

class Penilaian extends BaseController
{
    public function index()
    {

        $modelPenilaian = new ModelDaftarMenu();

        $data = [
            'menu'          => 'penilaian',
            'submenu'       => 'nilai',
            'viewdata'      => $modelPenilaian->findAll(),
        ];
        return view('penilaian/viewdata', $data);
    }


    public function formedit($id)
    {

        $modelBobot = new ModelBobot();

        $modelPenilaian = new ModelDaftarMenu();
        $dataNilai = $modelPenilaian->find($id);

        $data = [
            'menu'              => 'penilaian',
            'submenu'           => 'nilai',
            'menuid'            => $dataNilai['menuid'],
            'menunama'          => $dataNilai['menunama'],
            'menuharga'         => $dataNilai['menuharga'],
            'n_harga'           => $dataNilai['n_harga'],
            'n_rasa'            => $dataNilai['n_rasa'],
            'n_kebersihan'      => $dataNilai['n_kebersihan'],
            'n_pelayanan'       => $dataNilai['n_pelayanan'],
            'databobot'         => $modelBobot->findAll(),
        ];
        return view('penilaian/formedit', $data);
    }


    public function update()
    {

        if ($this->request->isAJAX()) {
            $menuid            = $this->request->getPost('menuid');
            $n_harga           = $this->request->getPost('n_harga');
            $n_rasa            = $this->request->getPost('n_rasa');
            $n_kebersihan      = $this->request->getPost('n_kebersihan');
            $n_pelayanan       = $this->request->getPost('n_pelayanan');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'n_harga' => [
                    'rules'     => 'required',
                    'label'     => 'Bobot Harga',
                    'errors'    => [
                        'required'  => '{field} tidak boleh kosong'
                    ]
                ],
                'n_rasa' => [
                    'rules'     => 'required',
                    'label'     => 'Bobot Rasa',
                    'errors'    => [
                        'required'  => '{field} tidak boleh kosong'
                    ]
                ],
                'n_kebersihan' => [
                    'rules'     => 'required',
                    'label'     => 'Bobot Kebersihan',
                    'errors'    => [
                        'required'  => '{field} tidak boleh kosong'
                    ]
                ],
                'n_pelayanan' => [
                    'rules'     => 'required',
                    'label'     => 'Bobot Pelayanan',
                    'errors'    => [
                        'required'  => '{field} tidak boleh kosong'
                    ]
                ],
            ]);

            if (!$valid) {
                $json = [
                    'error' => [
                        'errHarga'          => $validation->getError('n_harga'),
                        'errRasa'           => $validation->getError('n_rasa'),
                        'errKebersihan'     => $validation->getError('n_kebersihan'),
                        'errPelayanan'      => $validation->getError('n_pelayanan'),
                    ]
                ];
            } else {


                $modelNilai = new ModelDaftarMenu();

                // update Foto


                $modelNilai->update($menuid, [
                    'n_harga'           => $n_harga,
                    'n_rasa'            => $n_rasa,
                    'n_kebersihan'      => $n_kebersihan,
                    'n_pelayanan'       => $n_pelayanan,
                ]);

                $json = [
                    'sukses'        => 'Data berhasil dirubah'
                ];
            }


            echo json_encode($json);
        }
    }



    public function hitung()
    {


        $data = [
            'menu'          => 'penilaian',
            'submenu'       => 'perhitungan',
        ];
        return view('penilaian/kalkulasi', $data);
    }





    // Finish
}
