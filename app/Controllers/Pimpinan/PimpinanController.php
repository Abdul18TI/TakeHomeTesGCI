<?php

namespace App\Controllers\Pimpinan;

use App\Controllers\BaseController;
use App\Models\TagihanModel;
use App\Models\BayarModel;

class PimpinanController extends BaseController
{
    protected $tagihanModel;
    protected $bayarModel;
    public function __construct()
    {
        $this->tagihanModel = new TagihanModel();
        $this->bayarModel = new BayarModel();
        $this->session = session();
    }
    public function index()
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/login');
        }

        //cek role dari session
        if ($this->session->get('role') != 1) {
            return redirect()->to('/logout');
        }

        $tagihan = $this->tagihanModel->getData();
        $data = [
            'tagihan' => $tagihan
        ];

        return view('pimpinan/home', $data);
    }

    public function detail($id)
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/login');
        }

        //cek role dari session
        if ($this->session->get('role') != 1) {
            return redirect()->to('/logout');
        }

        $tagihan = $this->bayarModel->getDataWithId($id);
        $data = [
            'tagihan' => $tagihan
        ];
        // dd($data);
        return view('pimpinan/detail', $data);
    }

    public function laporan()
    {
        $tagihan = $this->bayarModel->getDataLaporan();
        $data = [
            'tagihan' => $tagihan
        ];
        // dd($data);
        return view('pimpinan/laporan', $data);
    }
}
