<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\MahasiswaModel;

class Login extends BaseController
{

    public function __construct()
    {
        //membuat user model untuk konek ke database 
        $this->userModel = new UserModel();
        $this->mahasiswaModel = new MahasiswaModel();

        //meload session
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        return view('login');
    }

    public function valid_login()
    {
        //ambil data dari form
        $data = $this->request->getPost();

        //ambil data user di database yang usernamenya sama 
        $user = $this->userModel->where('username', $data['username'])->first();
        $mahasiswa = $this->mahasiswaModel->where('username', $data['username'])->first();

        //cek apakah username ditemukan
        if ($user) {
            //cek password
            //jika salah arahkan lagi ke halaman login
            if ($user['password'] != $data['password']) {
                session()->setFlashdata('password', 'Username atau Password salah');
                return redirect()->to('/login');
            } else {
                //jika benar, arahkan user masuk ke aplikasi 
                $sessLogin = [
                    'isLogin' => true,
                    'nama' => $user['nama'],
                    'role' => $user['role']
                ];
                $this->session->set($sessLogin);
                if ($sessLogin['role'] == 2) {
                    return redirect()->to('/bendahara');
                } else {
                    return redirect()->to('/pimpinan');
                }
            }
        } elseif ($mahasiswa) {
            //cek password
            //jika salah arahkan lagi ke halaman login
            if ($mahasiswa['password'] != $data['password']) {
                session()->setFlashdata('password', 'Username atau Password salah');
                return redirect()->to('/login');
            } else {
                //jika benar, arahkan user masuk ke aplikasi 
                $sessLogin = [
                    'isLogin' => true,
                    'nama' => $mahasiswa['mahasiswa'],
                    'id' => $mahasiswa['mahasiswa_id'],
                    'role' => $mahasiswa['role']
                ];
                $this->session->set($sessLogin);
                return redirect()->to('/');
            }
        } else {
            //jika username tidak ditemukan, balikkan ke halaman login
            session()->setFlashdata('password', 'Username atau Password salah');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        //hancurkan session 
        //balikan ke halaman login
        $this->session->destroy();
        return redirect()->to('/login');
    }
}
