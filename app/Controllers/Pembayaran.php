<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pembayaran extends BaseController
{
    private $model;
    private $modelpembayaranalokasi;
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
        $this->modelpembayaranalokasi = new \App\Models\PembayaranAlokasiModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
            'link' => $this->link,
            'data' => $this->model->select('tb_pembayaran.*, no_transaksi, jenis_aktor')->select("tb_transaksi_kategori.nama as nama_kategori, tb_transaksi_kategori_sub.nama as nama_kategori_sub, (CASE WHEN jenis_aktor = 'siswa' THEN tb_siswa.nama ELSE tb_guru.nama END) as nama_aktor")->join('tb_transaksi', 'tb_transaksi.id = tb_pembayaran.id_transaksi')->join('tb_transaksi_kategori_sub', 'tb_transaksi_kategori_sub.id = tb_transaksi.id_kategori_sub')->join('tb_transaksi_kategori', 'tb_transaksi_kategori.id = tb_transaksi_kategori_sub.id_kategori')->join('tb_siswa', "tb_siswa.id = tb_transaksi.id_aktor AND tb_transaksi.jenis_aktor = 'siswa'", "LEFT")->join('tb_guru', "tb_guru.id = tb_transaksi.id_aktor AND tb_transaksi.jenis_aktor = 'guru'", "LEFT")->orderBy('tb_pembayaran.id', 'DESC')->findAll()
        ];

        return view($this->view . '/index', $data);
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
        $transaksi = $this->modeltransaksi->find($id_transaksi);

        $data = [
            'success' => true,
            'data' => [
                'transaksi' => $transaksi,
                'detail' => $result,
            ]
        ];

        return json_encode($data);
    }

    function create()
    {
        // dd($_POST);
        $rules = [
            'id_transaksi' => 'required',
            'method' => 'required',
            'bayar_nominal' => 'required',
        ];

        $input = $this->request->getVar();

        if (!$this->validateData($input, $rules)) {
            return redirect()->back()->withInput();
        }



        $no_pembayaran = time();
        $last_no_pembayaran = $this->model->limit(1)->orderBy('id', 'DESC')->first();

        $label = 'P';
        // $def_no_pembayaran = $label . '.24/12/2024/001';
        $def_no_pembayaran =   $label . '.' . date('d') . '/' . date('m') . '/' . date('Y') . '/000';

        if ($last_no_pembayaran) {
            $last_no_pembayaran = $last_no_pembayaran['no_pembayaran'];
            $last_no_pembayaran = $label . '.' . substr($last_no_pembayaran, 2, strlen($def_no_pembayaran));
        } else {
            $last_no_pembayaran = $def_no_pembayaran;
        }

        $no_pembayaran = autonumberDate($last_no_pembayaran, 2, 3);

        // insert ke pembayaran
        $data = [
            'id_transaksi' => htmlspecialchars($this->request->getVar('id_transaksi')),
            'method' => htmlspecialchars($this->request->getVar('method')),
            'bayar_nominal' => str_replace('.', '', htmlspecialchars($this->request->getVar('bayar_nominal'))),
            'no_pembayaran' => $no_pembayaran,
            'tanggal_pembayaran' => date('Y-m-d H:i:s'),
        ];

        $result = $this->modeltransaksi->find($data['id_transaksi']);

        if (!$result) {
            setAlert('warning', 'Peringatan', 'NOT VALID ID TRANSAKSI');
            return redirect()->to($this->link);
        }

        $res = $this->model->save($data);

        $id_pembayaran = $this->model->limit(1)->orderBy('id', 'DESC')->first()['id'];

        $total_nominal = $result['total_nominal'];
        $bayar_nominal = $result['bayar_nominal'];
        $bayar_nominal = $bayar_nominal + $data['bayar_nominal'];

        $sisa_nominal = ($total_nominal - $bayar_nominal);
        $status = ($sisa_nominal == 0) ? "Lunas" : 'Sebagian';

        // update transaksi
        $data_update = [
            'bayar_nominal' => $bayar_nominal,
            'sisa_nominal' => $sisa_nominal,
            'status' => $status
        ];

        $this->modeltransaksi->update($data['id_transaksi'], $data_update);

        $res_detail = $this->request->getVar('id_detail');
        $alokasi = $this->request->getVar('alokasi');
        $index = 0;
        foreach ($res_detail as $d) {

            $result_detail = $this->modeltransaksidetail->find($d);

            $data_alokasi = [
                'id_pembayaran' => $id_pembayaran,
                'id_transaksi_detail' => $d,
                'alokasi_nominal' => ($alokasi[$index]) ? str_replace(".", '', $alokasi[$index]) : 0,
            ];

            $this->modelpembayaranalokasi->save($data_alokasi);

            $subtotal = $result_detail['subtotal'];
            $bayar_nominal = $result_detail['bayar_nominal'];
            $bayar_nominal = ($bayar_nominal + $data_alokasi['alokasi_nominal']);
            $sisa_nominal = $subtotal - $bayar_nominal;

            $data_update_detail = [
                'bayar_nominal' => $bayar_nominal,
                'sisa_nominal' => $sisa_nominal
            ];

            $this->modeltransaksidetail->update($d, $data_update_detail);

            $index++;
        }

        if ($res) {
            setAlert('success', 'Berhasil', 'Pembayaran berhasil dilakukan');
        } else {
            setAlert('warning', 'Peringatan', 'Pembayaran gagal dilakukan');
        }

        return redirect()->to($this->link);
    }

    function show($id)
    {
        $result = $this->model->select("tb_pembayaran.*, jenis_aktor, tb_transaksi_kategori.nama as nama_kategori, tb_transaksi_kategori_sub.nama as nama_kategori_sub, (CASE WHEN jenis_aktor = 'siswa' THEN tb_siswa.nama ELSE tb_guru.nama END) as nama_aktor")->join('tb_transaksi', 'tb_transaksi.id = tb_pembayaran.id_transaksi')->join('tb_transaksi_kategori_sub', 'tb_transaksi_kategori_sub.id = tb_transaksi.id_kategori_sub')->join('tb_transaksi_kategori', 'tb_transaksi_kategori.id = tb_transaksi_kategori_sub.id_kategori')->join('tb_siswa_history', "tb_siswa_history.id = tb_transaksi.id_aktor AND tb_transaksi.jenis_aktor = 'siswa'", "LEFT")->join('tb_siswa', "tb_siswa.id = tb_siswa_history.id_siswa", "LEFT")->join('tb_guru', "tb_guru.id = tb_transaksi.id_aktor AND tb_transaksi.jenis_aktor = 'guru'", "LEFT")->find($id);
        if (!$result) {
            setAlert('warning', 'Peringatan', 'Data tidak sesuai');
            return redirect()->to($this->link);
        }

        $data = [
            'title' => $this->title,
            'link' => $this->link,
            'data' => $result,
            'detail' => $this->modelpembayaranalokasi->select('tb_pembayaran_alokasi.*, item, qty')->join('tb_transaksi_detail', 'tb_transaksi_detail.id = tb_pembayaran_alokasi.id_transaksi_detail')->where('id_pembayaran', $id)->findAll(),
        ];

        return view($this->view . '/show', $data);
    }

    public function kwitansi($id, $copy = 1)
    {
        $result = $this->model->select("tb_pembayaran.*, jenis_aktor, tb_transaksi_kategori.nama as nama_kategori, tb_transaksi_kategori_sub.nama as nama_kategori_sub, (CASE WHEN jenis_aktor = 'siswa' THEN tb_siswa.nama ELSE tb_guru.nama END) as nama_aktor, kelas.nama as nama_kelas, jurusan.nama as nama_jurusan, tahun.nama as nama_tahun,  tb_user.name as nama_user")->select("(CASE WHEN jenis_aktor = 'siswa' THEN tb_siswa.nipd ELSE tb_guru.nik END) as nik")->join('tb_transaksi', 'tb_transaksi.id = tb_pembayaran.id_transaksi')->join('tb_transaksi_kategori_sub', 'tb_transaksi_kategori_sub.id = tb_transaksi.id_kategori_sub')->join('tb_transaksi_kategori', 'tb_transaksi_kategori.id = tb_transaksi_kategori_sub.id_kategori')->join('tb_siswa_history', "tb_siswa_history.id = tb_transaksi.id_aktor AND tb_transaksi.jenis_aktor = 'siswa'", "LEFT")->join('tb_siswa', "tb_siswa.id = tb_siswa_history.id_siswa", "LEFT")->join('tb_guru', "tb_guru.id = tb_transaksi.id_aktor AND tb_transaksi.jenis_aktor = 'guru'", "LEFT")->join('tb_master_kategori as kelas', 'kelas.id = tb_siswa_history.id_kelas', 'LEFT')->join('tb_master_kategori as jurusan', 'jurusan.id = tb_siswa_history.id_jurusan', 'LEFT')->join('tb_master_kategori as tahun', 'tahun.id = tb_siswa_history.id_tahun', 'LEFT')->join('tb_user', 'tb_user.id = tb_transaksi.cid', 'LEFT')->find($id);
        if (!$result) {
            setAlert('warning', 'Peringatan', 'Data tidak sesuai');
            return redirect()->to($this->link);
        }


        $data = [
            'title' => $this->title,
            'link' => $this->link,
            'data' => $result,
            'copy' => $copy,
            'detail' => $this->modelpembayaranalokasi->join('tb_transaksi_detail', 'tb_transaksi_detail.id = tb_pembayaran_alokasi.id')->where('id_pembayaran', $id)->findAll(),
        ];

        return view($this->view . '/kwitansi', $data);
    }
}
