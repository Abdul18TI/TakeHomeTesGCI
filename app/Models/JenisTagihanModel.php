<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisTagihanModel extends Model
{
    protected $table = 'jenis_tagihan';
    protected $primaryKey = 'jenis_tagihan_id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['jenis_tagihan'];
}
