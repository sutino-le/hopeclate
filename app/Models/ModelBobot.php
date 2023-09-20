<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBobot extends Model
{
    protected $table            = 'bobot';
    protected $primaryKey       = 'bobotid';
    protected $allowedFields    = ['jenis', 'nilai'];

    // Dates
    protected $useTimestamps = false;
}
