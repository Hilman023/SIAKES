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
    private $title = 'Master Kategori';
    public function __construct()
    {
        $this->model = new \App\Models\MasterKategoriModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
            'link' => $this->link,
            'data' => $this->model->findAll()
        ];

        return view($this->view . '/index', $data);
    }
}
