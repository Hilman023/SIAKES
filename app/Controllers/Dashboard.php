<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    private $modelsiswa;
    private $modeltransaksi;
    private $link = 'dashboard';
    private $view = 'dashboard';
    private $title = 'Dashboard';
    public function __construct()
    {
        $this->modelsiswa = new \App\Models\SiswaModel();
        $this->modeltransaksi = new \App\Models\TransaksiModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
            'link' => $this->link,
            'siswa' => $this->modelsiswa->select('COUNT(id) as jumlah')->first()['jumlah'],
            'saldo' => $this->modeltransaksi->getRekap(true),

            'pemasukan' => $this->modeltransaksi->select('SUM(bayar_nominal) as jumlah')->join('tb_transaksi_kategori_sub', 'tb_transaksi_kategori_sub.id = tb_transaksi.id_kategori_sub ')->where('id_kategori', 1)->where('YEAR(tanggal_transaksi)', date('Y'))->where('MONTH(tanggal_transaksi)', date('m'))->first()['jumlah'],
            'pengeluaran' => $this->modeltransaksi->select('SUM(bayar_nominal) as jumlah')->join('tb_transaksi_kategori_sub', 'tb_transaksi_kategori_sub.id = tb_transaksi.id_kategori_sub ')->where('id_kategori', 2)->where('YEAR(tanggal_transaksi)', date('Y'))->where('MONTH(tanggal_transaksi)', date('m'))->first()['jumlah'],
        ];
        return view($this->view . '/index', $data);
    }
}
