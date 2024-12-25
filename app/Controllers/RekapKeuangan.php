<?php

namespace App\Controllers;

class RekapKeuangan extends BaseController
{
    private $model;
    private $link = 'rekap_keuangan';
    private $view = 'rekap_keuangan';
    private $title = 'Rekap Keuangan';
    public function __construct()
    {
        $this->model = new \App\Models\TransaksiModel();
    }

    public function index(): string
    {
        $data = [
            'title' => $this->title,
            'link' => $this->link,
            'data' => $this->model->getRekap(),
        ];
        return view($this->view . '/index', $data);
    }
}
