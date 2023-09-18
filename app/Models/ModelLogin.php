<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'userid';
    protected $allowedFields    = ['userid', 'username', 'password', 'level'];

    // Dates
    protected $useTimestamps = false;
}
