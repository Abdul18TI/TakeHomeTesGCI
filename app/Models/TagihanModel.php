<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Database\MySQLi\Builder;

class TagihanModel extends Model
{
    protected $table = 'tagihan';
    protected $primaryKey = 'tagihan_id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['tagihan', 'jenis_tagihan', 'jumlah_tagihan'];

    public function __construct()
    {
        $this->db = \config\Database::connect();
    }

    //function untuk menampilkan semua data
    public function getData()
    {
        $builder = $this->db->table('tagihan');
        $data = $builder->get()->getResult('array');
        return $data;
    }

    //function untuk mengambil data tertentu berdasarkan id
    public function getDataWithId($id)
    {
        $builder = $this->db->table('tagihan');
        $builder->where('tagihan_id', $id);
        $data = $builder->get()->getResult('array');
        return $data;
    }
}
