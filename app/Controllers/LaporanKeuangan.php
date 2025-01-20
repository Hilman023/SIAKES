<?php

namespace App\Controllers;

class LaporanKeuangan extends BaseController
{
    private $model;
    private $link = 'laporan_keuangan';
    private $view = 'laporan_keuangan';
    private $title = 'Laporan Keuangan';
    public function __construct()
    {
        $this->model = new \App\Models\TransaksiModel();
    }

    public function index()
    {

        $start = $this->request->getVar('start');
        $end = $this->request->getVar('end');

        $result = $this->model->select("tb_transaksi.*, tb_transaksi_kategori.nama as nama_kategori, tb_transaksi_kategori_sub.nama as nama_kategori_sub, (CASE WHEN jenis_aktor = 'siswa' THEN tb_siswa.nama ELSE tb_guru.nama END) as nama_aktor")->join('tb_transaksi_kategori_sub', 'tb_transaksi_kategori_sub.id = tb_transaksi.id_kategori_sub')->join('tb_transaksi_kategori', 'tb_transaksi_kategori.id = tb_transaksi_kategori_sub.id_kategori')->join('tb_siswa_history', "tb_siswa_history.id = tb_transaksi.id_aktor AND tb_transaksi.jenis_aktor = 'siswa'", "LEFT")->join('tb_siswa', "tb_siswa.id = tb_siswa_history.id_siswa", "LEFT")->join('tb_guru', "tb_guru.id = tb_transaksi.id_aktor AND tb_transaksi.jenis_aktor = 'guru'", "LEFT")->orderBy('id', 'DESC');

        if ($start) {
            $result = $result->where('CONVERT(tanggal_transaksi, date) >=', $start)->where('CONVERT(tanggal_transaksi, date) <=', $end);
        } else {
            $result = $result;
        }

        $result = $result->findAll();


        $data = [
            'title' => $this->title,
            'link' => $this->link,
            'data' => $result,
            'start' => $start,
            'end' => $end,
        ];

        return view($this->view . '/index', $data);
    }
}
