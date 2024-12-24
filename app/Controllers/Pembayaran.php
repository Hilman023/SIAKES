<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pembayaran extends BaseController
{
    private $model;
    private $modeltransaksi;
    private $modeltransaksidetail;
    private $link = 'pembayaran';
    private $view = 'pembayaran';
    private $title = 'Pembayaran';
    public function __construct()
    {
        $this->model = new \App\Models\PembayaranModel();
        $this->modeltransaksi = new \App\Models\TransaksiModel();
        $this->modeltransaksidetail = new \App\Models\TransaksiDetailModel();
    }

    public function index()
    {
        //
    }

    public function new()
    {
        $data = [
            'title' => $this->title,
            'link' => $this->link,
            'method' => $this->model->method,
            'transaksi' => $this->modeltransaksi->select("tb_transaksi.*, tb_transaksi_kategori.nama as nama_kategori, tb_transaksi_kategori_sub.nama as nama_kategori_sub, (CASE WHEN jenis_aktor = 'siswa' THEN tb_siswa.nama ELSE tb_guru.nama END) as nama_aktor")->join('tb_transaksi_kategori_sub', 'tb_transaksi_kategori_sub.id = tb_transaksi.id_kategori_sub')->join('tb_transaksi_kategori', 'tb_transaksi_kategori.id = tb_transaksi_kategori_sub.id_kategori')->join('tb_siswa', "tb_siswa.id = tb_transaksi.id_aktor AND tb_transaksi.jenis_aktor = 'siswa'", "LEFT")->join('tb_guru', "tb_guru.id = tb_transaksi.id_aktor AND tb_transaksi.jenis_aktor = 'guru'", "LEFT")->where('status !=', 'Paid')->orderBy('id', 'DESC')->findAll()
        ];

        return view($this->view . '/new', $data);
    }

    function ajax_transaksi_detail()
    {
        $id_transaksi = htmlspecialchars($this->request->getVar('id_transaksi'));

        $result = $this->modeltransaksidetail->where('id_transaksi', $id_transaksi)->findAll();

        $data = [
            'success' => true,
            'data' => $result
        ];

        return json_encode($data);
    }

    function create()
    {
        dd($_POST);

        
    }
}
