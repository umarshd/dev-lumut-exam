<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Post extends BaseController
{
    protected $PostModel;

    public function __construct()
    {
        $this->PostModel = new \App\Models\PostModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Post',
            'posts' => $this->PostModel->findAll()
        ];
        return view('admin/post/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Post',
        ];
        return view('admin/post/tambah', $data);
    }
}