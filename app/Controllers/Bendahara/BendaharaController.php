<?php

namespace App\Controllers\Bendahara;

use App\Controllers\BaseController;
use App\Models\TagihanModel;
use App\Models\JenisTagihanModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class BendaharaController extends BaseController
{
    protected $tagihanModel;
    protected $jenisTagihanModel;
    public function __construct()
    {
        $this->tagihanModel = new TagihanModel();
        $this->jenisTagihanModel = new JenisTagihanModel();
        $this->session = session();
    }

    //function untuk melihat daftar tagihan
    public function index()
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/login');
        }

        //cek role dari session
        if ($this->session->get('role') != 2) {
            return redirect()->to('/logout');
        }
        $data = [
            'tagihan' => $this->tagihanModel->getData()
        ];

        return view('bendahara/home', $data);
    }

    //function untuk melihat detail tagihan
    public function detail($id)
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/login');
        }

        //cek role dari session
        if ($this->session->get('role') != 2) {
            return redirect()->to('/logout');
        }
        echo $id;
    }

    //function untuk form menambah tagihan
    public function tambah()
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/login');
        }

        //cek role dari session
        if ($this->session->get('role') != 2) {
            return redirect()->to('/logout');
        }
        $jenisTagihan = $this->jenisTagihanModel->findAll();

        $data = [
            'validation' => \Config\Services::validation(),
            'tagihan' => $jenisTagihan
        ];

        return view('bendahara/tambah', $data);
    }

    //function untuk menambah tagihan
    public function simpan()
    {

        //validasi input
        if (!$this->validate([
            'tagihan' => [
                'rules' => 'required|is_unique[tagihan.tagihan]',
                'errors' => [
                    'required' => 'tagihan harus diisi.',
                    'is_unique' => 'tagihan sudah ada.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/bendahara/tambah')->withInput()->with('validation', $validation);
        }

        $this->tagihanModel->save([
            'tagihan' => $this->request->getVar('tagihan'),
            'jenis_tagihan' => $this->request->getVar('jenis_tagihan'),
            'jumlah_tagihan' => $this->request->getVar('jumlah_tagihan')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/bendahara');
    }

    //function untuk menghapus tagihan
    public function delete($id)
    {
        $this->tagihanModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/bendahara');
    }

    //function untuk edit tagihan
    public function ubah($id)
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/login');
        }

        //cek role dari session
        if ($this->session->get('role') != 2) {
            return redirect()->to('/logout');
        }
        $jenisTagihan = $this->jenisTagihanModel->findAll();

        $data = [
            'validation' => \Config\Services::validation(),
            'tagihan' => $this->tagihanModel->getDataWithId($id),
            'jenis_tagihan' => $jenisTagihan
        ];

        // dd($data['tagihan']);

        return view('bendahara/ubah', $data);
    }

    //function untuk menyimpan perubahan tagihan
    public function update($id)
    {

        $this->tagihanModel->save([
            'tagihan_id' => $id,
            'tagihan' => $this->request->getVar('tagihan'),
            'jenis_tagihan' => $this->request->getVar('jenis_tagihan'),
            'jumlah_tagihan' => $this->request->getVar('jumlah_tagihan')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('/bendahara');
    }


    //Bagian Jenis Tagihan


    //function untuk melihat daftar jenis tagihan
    public function tagihan()
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/login');
        }

        //cek role dari session
        if ($this->session->get('role') != 2) {
            return redirect()->to('/logout');
        }
        $jenisTagihan = $this->jenisTagihanModel->findAll();

        $data = [
            'tagihan' => $jenisTagihan
        ];

        return view('bendahara/tagihan', $data);
    }

    //function untuk form menambah jenis tagihan
    public function tambahTagihan()
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/login');
        }

        //cek role dari session
        if ($this->session->get('role') != 2) {
            return redirect()->to('/logout');
        }
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('bendahara/tambah_tagihan', $data);
    }

    //function untuk menambah jenis tagihan
    public function simpanJenisTagihan()
    {

        //validasi input
        if (!$this->validate([
            'jenis_tagihan' => [
                'rules' => 'required|is_unique[jenis_tagihan.jenis_tagihan]',
                'errors' => [
                    'required' => 'jenis tagihan harus diisi.',
                    'is_unique' => 'jenis tagihan sudah ada.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/bendahara/tambahtagihan')->withInput()->with('validation', $validation);
        }

        $this->jenisTagihanModel->save([
            'jenis_tagihan' => $this->request->getVar('jenis_tagihan')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/bendahara/tagihan');
    }

    //function untuk menghapus jenis tagihan
    public function deleteJenisTagihan($id)
    {
        $this->jenisTagihanModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/bendahara/tagihan');
    }

    //function untuk edit jenis tagihan
    public function editJenisTagihan($id)
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/login');
        }

        //cek role dari session
        if ($this->session->get('role') != 2) {
            return redirect()->to('/logout');
        }
        $data = [
            'validation' => \Config\Services::validation(),
            'tagihan' => $this->jenisTagihanModel->find($id)
        ];

        return view('bendahara/edit_tagihan', $data);
    }

    //function untuk menyimpan perubahan tagihan
    public function updateJenisTagihan($id)
    {
        //validasi input
        if (!$this->validate([
            'jenis_tagihan' => [
                'rules' => 'required|is_unique[jenis_tagihan.jenis_tagihan]',
                'errors' => [
                    'required' => 'jenis tagihan harus diisi.',
                    'is_unique' => 'jenis tagihan sudah ada.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/bendahara/ubahtagihan/' . $id)->withInput()->with('validation', $validation);
        }

        $this->jenisTagihanModel->save([
            'jenis_tagihan_id' => $id,
            'jenis_tagihan' => $this->request->getVar('jenis_tagihan')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('/bendahara/tagihan');
    }
}
