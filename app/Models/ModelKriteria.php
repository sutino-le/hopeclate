<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKriteria extends Model
{
    protected $table            = 'kriteria';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['kriteria', 'bobot', 'atribut'];

    // Dates
    protected $useTimestamps = false;

    // tampil kriteria
    public function TampilKriteria()
    {
        return $this->table('kriteria')->join('bobot', 'bobotid=bobot', 'left')->get();
    }
}
