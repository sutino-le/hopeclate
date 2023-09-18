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
}
