<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Database\MySQLi\Builder;

class BayarModel extends Model
{
    protected $table = 'bayar';
    protected $primaryKey = 'bayar_id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['tagihan_id', 'mahasiswa_id'];

    public function __construct()
    {
        $this->db = \config\Database::connect();
    }

    //function untuk menampilkan semua tagihan yang belum dibayar
    public function getDataTagihan($id)
    {
        $db = db_connect();
        $data = $db->query('SELECT * FROM tagihan WHERE tagihan_id NOT IN (
            select distinct tagihan_id
            from bayar
            where mahasiswa_id = ' . $id . ')')->getResult('array');
        return $data;
    }

    //function untuk menampilkan semua tagihan yang sudah dibayar
    public function getDataLunas($id)
    {
        $builder = $this->db->table('bayar');
        $builder->select('*');
        $builder->join('tagihan', 'tagihan.tagihan_id = bayar.tagihan_id');
        $builder->where('bayar.mahasiswa_id', $id);
        $data = $builder->get()->getResult('array');
        return $data;
    }

    //function untuk menampilkan semua tagihan yang sudah dibayar
    public function getDataWithId($id)
    {
        $builder = $this->db->table('tagihan');
        $builder->select('*');
        $builder->join('bayar', 'bayar.tagihan_id = tagihan.tagihan_id', 'left');
        $builder->join('mahasiswa', 'mahasiswa.mahasiswa_id = bayar.mahasiswa_id', 'right');
        // dd($mahasiswa);
        $builder->where('tagihan.tagihan_id', $id);
        $data = $builder->get()->getResult('array');
        return $data;
    }

    //function untuk menampilkan laporan
    public function getDataLaporan()
    {
        $builder = $this->db->table('bayar');
        $builder->selectCount('bayar.mahasiswa_id', 'sudah_bayar');
        $builder->select('tagihan.tagihan');
        $builder->join('tagihan', 'tagihan.tagihan_id = bayar.tagihan_id', 'right');
        $builder->groupBy('bayar.tagihan_id');
        $data = $builder->get()->getResult('array');
        return $data;
    }
}
