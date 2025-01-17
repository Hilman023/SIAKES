<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class MasterKategori extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

    private $model;
    private $link = 'master_kategori';
    private $view = 'master_kategori';
    private $title = 'Kategori Master ';
    public function __construct()
    {
        $this->model = new \App\Models\MasterKategoriModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
            'link' => $this->link,
            'data' => $this->model->findAll(),
            'kelas' => $this->model->where('jenis', 'kelas')->findAll(),
            'jurusan' => $this->model->where('jenis', 'jurusan')->findAll(),
            'tahun' => $this->model->where('jenis', 'tahun')->orderBy('id', 'DESC')->findAll(),
        ];

        return view($this->view . '/index', $data);
    }
}
