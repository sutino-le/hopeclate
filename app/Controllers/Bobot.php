<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBobot;

class Bobot extends BaseController
{
    public function index()
    {

        $modelBobot = new ModelBobot();

        $data = [
            'menu'          => 'setting',
            'submenu'       => 'bobot',
            'viewdata'      => $modelBobot->findAll(),
        ];
        return view('bobot/viewdata', $data);
    }


    public function formtambah()
    {


        $data = [
            'menu'          => 'setting',
            'submenu'       => 'bobot',
        ];
        return view('bobot/formtambah', $data);
    }


    public function simpan()
    {

        if ($this->request->isAJAX()) {
            $jenis           = $this->request->getPost('jenis');
            $nilai              = $this->request->getPost('nilai');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'jenis' => [
                    'rules'     => 'required',
                    'label'     => 'Jenis',
                    'errors'    => [
                        'required'  => '{field} tidak boleh kosong'
                    ]
                ],
                'nilai' => [
                    'rules'     => 'required',
                    'label'     => 'Nilai',
                    'errors'    => [
                        'required'  => '{field} tidak boleh kosong'
                    ]
                ],
            ]);

            if (!$valid) {
                $json = [
                    'error' => [
                        'errJenis'       => $validation->getError('jenis'),
                        'errNilai'          => $validation->getError('nilai'),
                    ]
                ];
            } else {


                $modelBobot = new ModelBobot();

                // update Foto


                $modelBobot->insert([
                    'bobotid'           => '',
                    'jenis'             => $jenis,
                    'nilai'             => $nilai,
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

        $modelBobot = new ModelBobot();
        $dataBobot = $modelBobot->find($id);

        $data = [
            'menu'          => 'setting',
            'submenu'       => 'bobot',
            'bobotid'       => $dataBobot['bobotid'],
            'jenis'         => $dataBobot['jenis'],
            'nilai'         => $dataBobot['nilai'],
        ];
        return view('bobot/formedit', $data);
    }


    public function update()
    {

        if ($this->request->isAJAX()) {
            $bobotid            = $this->request->getPost('bobotid');
            $jenis              = $this->request->getPost('jenis');
            $nilai              = $this->request->getPost('nilai');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'jenis' => [
                    'rules'     => 'required',
                    'label'     => 'Jenis',
                    'errors'    => [
                        'required'  => '{field} tidak boleh kosong'
                    ]
                ],
                'nilai' => [
                    'rules'     => 'required',
                    'label'     => 'Nilai',
                    'errors'    => [
                        'required'  => '{field} tidak boleh kosong'
                    ]
                ],
            ]);

            if (!$valid) {
                $json = [
                    'error' => [
                        'errJenis'       => $validation->getError('jenis'),
                        'errNilai'          => $validation->getError('nilai'),
                    ]
                ];
            } else {


                $modelBobot = new ModelBobot();

                // update Foto


                $modelBobot->update($bobotid, [
                    'jenis'          => $jenis,
                    'nilai'          => $nilai,
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
        $modelBobot = new ModelBobot();
        $datamenu = $modelBobot->find($id);


        $modelBobot->delete($id);

        $json = [
            'sukses' => 'Data berhasil dihapus...'
        ];


        echo json_encode($json);
    }
}