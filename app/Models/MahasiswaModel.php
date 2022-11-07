<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = "mahasiswa";
    protected $primaryKey = "mahasiswa_id";
    protected $allowedFields = ["username", "password", "mahasiswa", "role"];
    protected $useAutoIncrement = true;
}
