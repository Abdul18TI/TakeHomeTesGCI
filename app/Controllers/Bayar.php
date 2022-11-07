<?php

namespace App\Controllers;

use App\Models\TagihanModel;
use App\Models\BayarModel;

class Bayar extends BaseController
{
    protected $tagihanModel;
    protected $bayarModel;
    public function __construct()
    {
        $this->tagihanModel = new TagihanModel();
        $this->bayarModel = new BayarModel();
        $this->session = session();
    }
    public function index($id)
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/login');
        }

        //cek role dari session
        if ($this->session->get('role') != 3) {
            return redirect()->to('/logout');
        }
        $data = [
            'tagihan' => $this->tagihanModel->getDataWithId($id)
        ];
        return view('mahasiswa/bayar', $data);
    }

    public function bayar()
    {
        $this->bayarModel->save([
            'tagihan_id' => $this->request->getVar('tagihan_id'),
            'mahasiswa_id' => $this->request->getVar('mahasiswa_id')
        ]);

        session()->setFlashdata('pesan', 'Pembayaran berhasil !');

        return redirect()->to('/');
    }
}
