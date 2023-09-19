<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDaftarMenu extends Model
{
    protected $table            = 'daftarmenu';
    protected $primaryKey       = 'menuid';
    protected $allowedFields    = ['menunama', 'menukategori', 'menuharga', 'menufoto', 'penjualan', 'rasa', 'kebersihan', 'pelayanan'];

    // Dates
    protected $useTimestamps = false;

    // manggil kategori food
    public function Food($food)
    {
        return $this->table('daftarmenu')->getWhere([
            'menukategori' => $food
        ]);
    }


    //  manggil kategori beverages
    public function Beverages($beverages)
    {
        return $this->table('daftarmenu')->getWhere([
            'menukategori' => $beverages
        ]);
    }
}
