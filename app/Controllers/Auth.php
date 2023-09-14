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
}