<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Account extends BaseController
{
    protected $AccountModel;
    public function __construct()
    {
        $this->AccountModel = new \App\Models\AccountModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Account',
            'accounts' => $this->AccountModel->findAll()
        ];
        return view('admin/account/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Account',
        ];
        return view('admin/account/tambah', $data);
    }

    public function prosesTambah()
    {
        $rules = $this->validate([
            'username' => [
                'rules' => 'required|is_unique[account.username]',
                'errors' => [
                    'required' => 'Username harus diisi.',
                    'is_unique' => 'Username sudah terdaftar.'
                ]
            ],
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi.'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi.'
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role harus diisi.'
                ]
            ]
        ]);

        if (!$rules) {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $password = $this->request->getVar('password');
        $password_konfirmasi = $this->request->getVar('password_konfirmasi');

        if ($password != $password_konfirmasi) {
            session()->setFlashdata('errors', 'Password konfirmasi tidak sama.');
            return redirect()->back()->withInput();
        }

        $data = [
            'username' => $this->request->getVar('username'),
            'name' => $this->request->getVar('name'),
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => $this->request->getVar('role')
        ];

        $this->AccountModel->insert($data);
        session()->setFlashdata('success', 'Berhasil menambahkan data.');
        return redirect()->to('/admin/account');
    }
}