<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "user";
    protected $primaryKey = "user_id";
    protected $allowedFields = ["username", "password", "nama", "role"];
    protected $useAutoIncrement = true;
}
