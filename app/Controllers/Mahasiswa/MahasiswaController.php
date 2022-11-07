<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use App\Models\BayarModel;
use App\Models\TagihanModel;

class MahasiswaController extends BaseController
{
    protected $bayarModel;
    protected $tagihanModel;
    public function __construct()
    {
        $this->bayarModel = new BayarModel();
        $this->tagihanModel = new TagihanModel();
        $this->session = session();
    }

    //function untuk melihat semua tagihan
    public function index()
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/login');
        }

        //cek role dari session
        if ($this->session->get('role') != 3) {
            return redirect()->to('/logout');
        }

        // $id = $this->session->get('id');
        $tagihan = $this->tagihanModel->getData();
        $data = [
            'tagihan' => $tagihan
        ];
        // dd($data);

        return view('mahasiswa/home', $data);
    }

    //function untuk melihat tagihan yang belum dibayar
    public function tagihan($id)
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/login');
        }

        //cek role dari session
        if ($this->session->get('role') != 3) {
            return redirect()->to('/logout');
        }

        // $id = $this->session->get('id');
        $tagihan = $this->bayarModel->getDataTagihan($id);
        $data = [
            'tagihan' => $tagihan
        ];
        // dd($data);

        return view('mahasiswa/tagihan', $data);
    }

    //function untuk melihat tagihan yang sudah dibayar
    public function tagihan_lunas($id)
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/login');
        }

        //cek role dari session
        if ($this->session->get('role') != 3) {
            return redirect()->to('/logout');
        }

        // $id = $this->session->get('id');
        $tagihan = $this->bayarModel->getDataLunas($id);
        $data = [
            'tagihan' => $tagihan
        ];
        // dd($data);

        return view('mahasiswa/lunas', $data);
    }
}
