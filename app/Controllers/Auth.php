<?php

namespace App\Controllers;

class Auth extends BaseController
{
    protected $AccountModel;

    public function __construct()
    {
        $this->AccountModel = new \App\Models\AccountModel();
    }

    public function login()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('auth/login', $data);
    }

    public function prosesLogin()
    {
        $rules = $this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username tidak boleh kosong'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password tidak boleh kosong'
                ]
            ]
        ]);

        if (!$rules) {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/')->withInput();
        }

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $cek = $this->AccountModel->where('username', $username)->first();

        if (!$cek) {
            session()->setFlashdata('errors', 'Username atau password salah');
            return redirect()->to('/')->withInput();
        }

        $password_hash = password_verify($password, $cek['password']);

        if (!$password_hash) {
            session()->setFlashdata('errors', 'Username atau password salah');
            return redirect()->to('/')->withInput();
        }

        $data = [
            'username' => $cek['username'],
            'role' => $cek['role'],
            'logged_in' => TRUE
        ];

        session()->set($data);

        if ($cek['role'] == 'admin') {
            return redirect()->to('/admin/post');
        } else {
            return redirect()->to('/author/post');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}