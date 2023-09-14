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

    public function prosesTambah()
    {
        $rules = $this->validate([
            'title' => [
                'rules' => 'required|is_unique[post.title]',
                'errors' => [
                    'required' => 'Title tidak boleh kosong',
                    'is_unique' => 'Title sudah ada'
                ]
            ],
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Content tidak boleh kosong'
                ]
            ],
            'date' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Date tidak boleh kosong'
                ]
            ],
        ]);

        if (!$rules) {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/admin/post/tambah')->withInput();
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'date' => $this->request->getPost('date'),
            'username' => session()->get('username')
        ];

        $this->PostModel->insert($data);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/admin/post');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Post',
            'post' => $this->PostModel->find($id)
        ];
        return view('admin/post/edit', $data);
    }
}