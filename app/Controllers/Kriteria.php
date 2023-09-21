<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBobot;
use App\Models\ModelKriteria;

class Kriteria extends BaseController
{
    public function index()
    {

        $modelKriteria = new ModelKriteria();

        $data = [
            'menu'          => 'setting',
            'submenu'       => 'kriteria',
            'viewdata'      => $modelKriteria->TampilKriteria(),
        ];
        return view('kriteria/viewdata', $data);
    }


    public function formtambah()
    {
        $modelBobot = new ModelBobot();

        $data = [
            'menu'          => 'setting',
            'submenu'       => 'kriteria',
            'databobot'     => $modelBobot->findAll(),
        ];
        return view('kriteria/formtambah', $data);
    }


    public function simpan()
    {

        if ($this->request->isAJAX()) {
            $kriteria           = $this->request->getPost('kriteria');
            $bobot              = $this->request->getPost('bobot');
            $atribut            = $this->request->getPost('atribut');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'kriteria' => [
                    'rules'     => 'required',
                    'label'     => 'Kriteria',
                    'errors'    => [
                        'required'  => '{field} tidak boleh kosong'
                    ]
                ],
                'bobot' => [
                    'rules'     => 'required',
                    'label'     => 'Bobot',
                    'errors'    => [
                        'required'  => '{field} tidak boleh kosong'
                    ]
                ],
                'atribut' => [
                    'rules'     => 'required',
                    'label'     => 'Atribut',
                    'errors'    => [
                        'required'  => '{field} tidak boleh kosong'
                    ]
                ],
            ]);

            if (!$valid) {
                $json = [
                    'error' => [
                        'errKriteria'       => $validation->getError('kriteria'),
                        'errBobot'          => $validation->getError('bobot'),
                        'errAtribut'        => $validation->getError('atribut'),
                    ]
                ];
            } else {


                $modelKriteria = new ModelKriteria();

                // update Foto


                $modelKriteria->insert([
                    'id'                => '',
                    'kriteria'          => $kriteria,
                    'bobot'             => $bobot,
                    'atribut'           => $atribut,
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

        $modelKriteria = new ModelKriteria();
        $dataKriteria = $modelKriteria->find($id);

        $data = [
            'menu'          => 'setting',
            'submenu'       => 'kriteria',
            'id'            => $dataKriteria['id'],
            'kriteria'      => $dataKriteria['kriteria'],
            'bobot'         => $dataKriteria['bobot'],
            'atribut'       => $dataKriteria['atribut'],
            'databobot'     => $modelBobot->findAll(),
        ];
        return view('kriteria/formedit', $data);
    }


    public function update()
    {

        if ($this->request->isAJAX()) {
            $id                 = $this->request->getPost('id');
            $kriteria           = $this->request->getPost('kriteria');
            $bobot              = $this->request->getPost('bobot');
            $atribut            = $this->request->getPost('atribut');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'kriteria' => [
                    'rules'     => 'required',
                    'label'     => 'Kriteria',
                    'errors'    => [
                        'required'  => '{field} tidak boleh kosong'
                    ]
                ],
                'bobot' => [
                    'rules'     => 'required',
                    'label'     => 'Bobot',
                    'errors'    => [
                        'required'  => '{field} tidak boleh kosong'
                    ]
                ],
                'atribut' => [
                    'rules'     => 'required',
                    'label'     => 'Atribut',
                    'errors'    => [
                        'required'  => '{field} tidak boleh kosong'
                    ]
                ],
            ]);

            if (!$valid) {
                $json = [
                    'error' => [
                        'errKriteria'       => $validation->getError('kriteria'),
                        'errBobot'          => $validation->getError('bobot'),
                        'errAtribut'        => $validation->getError('atribut'),
                    ]
                ];
            } else {


                $modelKriteria = new ModelKriteria();

                // update Foto


                $modelKriteria->update($id, [
                    'kriteria'          => $kriteria,
                    'bobot'             => $bobot,
                    'atribut'           => $atribut,
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
        $modelKriteria = new ModelKriteria();
        $datamenu = $modelKriteria->find($id);


        $modelKriteria->delete($id);

        $json = [
            'sukses' => 'Data berhasil dihapus...'
        ];


        echo json_encode($json);
    }
}
