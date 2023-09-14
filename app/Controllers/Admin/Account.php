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
}