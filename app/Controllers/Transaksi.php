<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Transaksi extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

    private $model;
    private $modeluser;
    private $modeltransaksidetail;
    private $modelpembayaran;
    private $modelsiswa;
    private $modelguru;
    private $modeltransakskategori;
    private $modeltransakskategorisub;
    private $modeltransaksiitem;
    private $link = 'transaksi';
    private $view = 'transaksi';
    private $title = 'Transaksi';
    private $key_cart = 'transaksi_detail';
    public function __construct()
    {
        $this->model = new \App\Models\TransaksiModel();
        $this->modelsiswa = new \App\Models\SiswaModel();
        $this->modelguru = new \App\Models\GuruModel();
        $this->modeltransakskategori = new \App\Models\TransaksiKategoriModel();
        $this->modeltransakskategorisub = new \App\Models\TransaksiKategoriSubModel();
        $this->modeltransaksiitem = new \App\Models\TransaksiItemModel();
        $this->modeltransaksidetail = new \App\Models\TransaksiDetailModel();
        $this->modelpembayaran = new \App\Models\PembayaranModel();
        $this->modeluser = new \App\Models\UserModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
            'link' => $this->link,
            'data' => $this->model->select("tb_transaksi.*, tb_transaksi_kategori.nama as nama_kategori, tb_transaksi_kategori_sub.nama as nama_kategori_sub, (CASE WHEN jenis_aktor = 'siswa' THEN tb_siswa.nama ELSE tb_guru.nama END) as nama_aktor")->join('tb_transaksi_kategori_sub', 'tb_transaksi_kategori_sub.id = tb_transaksi.id_kategori_sub')->join('tb_transaksi_kategori', 'tb_transaksi_kategori.id = tb_transaksi_kategori_sub.id_kategori')->join('tb_siswa_history', "tb_siswa_history.id = tb_transaksi.id_aktor AND tb_transaksi.jenis_aktor = 'siswa'", "LEFT")->join('tb_siswa', "tb_siswa.id = tb_siswa_history.id_siswa", "LEFT")->join('tb_guru', "tb_guru.id = tb_transaksi.id_aktor AND tb_transaksi.jenis_aktor = 'guru'", "LEFT")->orderBy('id', 'DESC')->findAll()
        ];

        return view($this->view . '/index', $data);
    }


    public function ajax_list_aktor()
    {
        $jenis_aktor = htmlspecialchars($this->request->getVar('jenis_aktor'));


        if ($jenis_aktor) {

            if (strtolower($jenis_aktor) == 'siswa') {
                $list = $this->modelsiswa->select('tb_siswa.*, tb_siswa.nipd as nomer_induk, tb_siswa_history.id as id_aktor')->join('tb_siswa_history', 'tb_siswa_history.id_siswa = tb_siswa.id AND tb_siswa_history.id_kelas = tb_siswa.id_kelas AND tb_siswa_history.id_jurusan = tb_siswa.id_jurusan AND tb_siswa_history.id_tahun = tb_siswa.id_tahun')->findAll();
            } else if (strtolower($jenis_aktor) == 'guru') {
                $list = $this->modelguru->select('tb_guru.*,tb_guru.nik as nomer_induk, tb_guru.id as id_aktor')->findAll();
            }


            $data = [
                'success' => true,
                'data' => $list
            ];
        } else {
            $data = [
                'success' => false,
                'message' => 'Not Valid'
            ];
        }

        return json_encode($data);
    }

    function ajax_aktor()
    {
        $id_aktor = htmlspecialchars($this->request->getVar('id_aktor'));
        $jenis_aktor = htmlspecialchars($this->request->getVar('jenis_aktor'));

        if ($id_aktor) {
            if (strtolower($jenis_aktor) == 'siswa') {
                $list = $this->modelsiswa->select('tb_siswa.*, tb_siswa.nipd as nomer_induk, tb_siswa_history.id as id_aktor, kt_kelas.nama as nama_kelas, kt_jurusan.nama as nama_jurusan, kt_tahun.nama as nama_tahun')->join('tb_siswa_history', 'tb_siswa_history.id_siswa = tb_siswa.id AND tb_siswa_history.id_kelas = tb_siswa.id_kelas AND tb_siswa_history.id_jurusan = tb_siswa.id_jurusan AND tb_siswa_history.id_tahun = tb_siswa.id_tahun')->join('tb_master_kategori as kt_kelas', 'kt_kelas.id = tb_siswa.id_kelas')->join('tb_master_kategori as kt_jurusan', 'kt_jurusan.id = tb_siswa.id_jurusan')->join('tb_master_kategori as kt_tahun', 'kt_tahun.id = tb_siswa.id_tahun')->where('tb_siswa_history.id', $id_aktor)->first();
            } else if (strtolower($jenis_aktor) == 'guru') {
                $list = $this->modelguru->select('tb_guru.*,tb_guru.nik as nomer_induk, tb_guru.id as id_aktor')->find($id_aktor);
            }
            $data = [
                'success' => true,
                'data' => $list
            ];
        } else {
            $data = [
                'success' => false,
                'message' => 'Not Valid'
            ];
        }

        return json_encode($data);
    }

    function ajax_kategori_sub()
    {
        $id = htmlspecialchars($this->request->getVar('id'));
        $result = $this->modeltransakskategorisub->where('id_kategori', $id)->findAll();
        if ($result) {
            $data = [
                'success' => true,
                'data' => $result
            ];
        } else {
            $data = [
                'success' => false,
                'message' => 'Not Valid'
            ];
        }

        return json_encode($data);
    }

    function ajax_item_transaksi()
    {
        $id = htmlspecialchars($this->request->getVar('id'));
        $result = $this->modeltransaksiitem->where('id_kategori_sub', $id)->findAll();
        if ($result) {
            $is_manual = $this->modeltransakskategorisub->find($id);
            $data = [
                'success' => true,
                'is_manual' => $is_manual['is_manual'],
                'data' => $result
            ];
        } else {
            $data = [
                'success' => false,
                'message' => 'Not Valid'
            ];
        }

        return json_encode($data);
    }


    function ajax_item()
    {
        $id = htmlspecialchars($this->request->getVar('id'));
        $result = $this->modeltransaksiitem->select('tb_transaksi_item.*, is_manual')->join('tb_transaksi_kategori_sub', 'tb_transaksi_kategori_sub.id = tb_transaksi_item.id_kategori_sub')->where('tb_transaksi_item.nama', $id)->first();
        if ($result) {
            $data = [
                'success' => true,
                'data' => $result
            ];
        } else {
            $data = [
                'success' => false,
                'message' => 'Not Valid'
            ];
        }

        return json_encode($data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        session()->remove($this->key_cart);
        $data = [
            'title' => $this->title,
            'link' => $this->link,
            'jenis_aktor' => $this->model->jenis_aktor,
            'kategori' => $this->modeltransakskategori->findAll(),
        ];

        return view($this->view . '/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $rules = [
            'id_aktor' => 'required',
            'jenis_aktor' => 'required',
            'id_kategori_sub' => 'required',
        ];

        $input = $this->request->getVar();

        if (!$this->validateData($input, $rules)) {
            return redirect()->back()->withInput();
        }

        // $no_transaksi = time();

        // $last_no_transaksi = $this->model->limit(1)->orderBy('id', 'DESC')->first();

        $id_kategori = $this->modeltransakskategorisub->find($this->request->getVar('id_kategori_sub'))['id_kategori'];

        $last_no_transaksi = $this->model->join('tb_transaksi_kategori_sub', 'tb_transaksi_kategori_sub.id = tb_transaksi.id_kategori_sub')->where('id_kategori', $id_kategori)->limit(1)->orderBy('tb_transaksi.id', 'DESC')->first();
        if ($id_kategori == 1) {
            $label = 'D';
        } else if ($id_kategori == 2) {
            $label = 'K';
        }

        // $def_no_transaksi = $label . '.24/12/2024/001';
        $def_no_transaksi = $label . '.' . date('d') . '/' . date('m') . '/' . date('Y') . '/000';

        if ($last_no_transaksi) {
            $last_no_transaksi = $last_no_transaksi['no_transaksi'];
            $last_no_transaksi = $label . substr($last_no_transaksi, 1, strlen($def_no_transaksi));
        } else {
            $last_no_transaksi = $def_no_transaksi;
        }

        $no_transaksi = autonumberDate($last_no_transaksi, 2, 3);

        $total_nominal = 0;

        $item_detail = getCart($this->key_cart);
        foreach ($item_detail as $d) {
            $total_nominal += intval($d['subtotal']);
        }

        $data = [
            'id_aktor' => htmlspecialchars($this->request->getVar('id_aktor')),
            'jenis_aktor' => htmlspecialchars($this->request->getVar('jenis_aktor')),
            'id_kategori_sub' => htmlspecialchars($this->request->getVar('id_kategori_sub')),
            'no_transaksi' => $no_transaksi,
            'tanggal_transaksi' => date('Y-m-d H:i:s'),
            'total_nominal' => $total_nominal,
            'bayar_nominal' => 0,
            'sisa_nominal' => $total_nominal,
        ];

        $res = $this->model->save($data);

        $id_transaksi = $this->model->limit(1)->orderBy('id', 'DESC')->first()['id'];

        foreach ($item_detail as $d) {
            $data_detail = [
                'id_transaksi' => $id_transaksi,
                'item' => $d['item'],
                'qty' => $d['qty'],
                'harga' => $d['harga'],
                'subtotal' => $d['subtotal'],
                'keterangan' => $d['keterangan'],
            ];


            $this->modeltransaksidetail->insert($data_detail);
        }

        session()->remove($this->key_cart);

        if ($res) {
            setAlert('success', 'Berhasil', 'Transaksi berhasil dilakukan');
        } else {
            setAlert('warning', 'Peringatan', 'Transaksi gagal dilakukan');
        }

        return redirect()->to($this->link);
    }


    // 
    public function set_item()
    {
        $item = htmlspecialchars($this->request->getVar('item'));
        $qty = htmlspecialchars($this->request->getVar('qty'));
        $harga = htmlspecialchars($this->request->getVar('harga'));
        $subtotal = htmlspecialchars($this->request->getVar('subtotal'));
        $keterangan = htmlspecialchars($this->request->getVar('keterangan'));

        $data = [
            'item' => $item,
            'qty' => $qty,
            'harga' => $harga,
            'subtotal' => $subtotal,
            'keterangan' => $keterangan,
        ];

        $result  = setCart($this->key_cart, $data);
        $data = [
            'success' => true,
            'data' => $result
        ];
        return json_encode($data);
    }

    public function get_item()
    {
        $id = htmlspecialchars($this->request->getVar('id'));
        $id = ($id) ? $id : null;
        $result = getCart($this->key_cart, $id);
        $data = [
            'success' => true,
            'data' => $result
        ];

        return json_encode($data);
    }

    public function delete_item()
    {
        $id = htmlspecialchars($this->request->getVar('id'));
        $result = deleteCart($this->key_cart, $id);
        if ($result) {
            $data = [
                'success' => true,
                'data' => $result
            ];
        } else {
            $data = [
                'success' => false,
                'message' => 'Not Valid'
            ];
        }

        return json_encode($data);
    }

    public function show($id)
    {
        $result = $this->model->select("tb_transaksi.*, tb_transaksi_kategori.nama as nama_kategori, tb_transaksi_kategori_sub.nama as nama_kategori_sub, (CASE WHEN jenis_aktor = 'siswa' THEN tb_siswa.nama ELSE tb_guru.nama END) as nama_aktor, kelas.nama as nama_kelas, jurusan.nama as nama_jurusan, tahun.nama as nama_tahun")->join('tb_transaksi_kategori_sub', 'tb_transaksi_kategori_sub.id = tb_transaksi.id_kategori_sub')->join('tb_transaksi_kategori', 'tb_transaksi_kategori.id = tb_transaksi_kategori_sub.id_kategori')->join('tb_siswa_history', "tb_siswa_history.id = tb_transaksi.id_aktor AND tb_transaksi.jenis_aktor = 'siswa'", "LEFT")->join('tb_siswa', "tb_siswa.id = tb_siswa_history.id_siswa", "LEFT")->join('tb_guru', "tb_guru.id = tb_transaksi.id_aktor AND tb_transaksi.jenis_aktor = 'guru'", "LEFT")->join('tb_master_kategori as kelas', 'kelas.id = tb_siswa_history.id_kelas', 'LEFT')->join('tb_master_kategori as jurusan', 'jurusan.id = tb_siswa_history.id_jurusan', 'LEFT')->join('tb_master_kategori as tahun', 'tahun.id = tb_siswa_history.id_tahun', 'LEFT')->find($id);
        if (!$result) {
            setAlert('warning', 'Peringatan', 'Data tidak sesuai');
            return redirect()->to($this->link);
        }

        $data = [
            'title' => $this->title,
            'link' => $this->link,
            'data' => $result,
            'detail' => $this->modeltransaksidetail->where('id_transaksi', $id)->findAll(),
            'pembayaran' => $this->modelpembayaran->where('id_transaksi', $id)->findAll(),
        ];

        return view($this->view . '/show', $data);
    }

    public function edit($id)
    {
        $result = $this->model->select("tb_transaksi.*, tb_transaksi_kategori.nama as nama_kategori, tb_transaksi_kategori_sub.nama as nama_kategori_sub, (CASE WHEN jenis_aktor = 'siswa' THEN tb_siswa.nama ELSE tb_guru.nama END) as nama_aktor")->join('tb_transaksi_kategori_sub', 'tb_transaksi_kategori_sub.id = tb_transaksi.id_kategori_sub')->join('tb_transaksi_kategori', 'tb_transaksi_kategori.id = tb_transaksi_kategori_sub.id_kategori')->join('tb_siswa_history', "tb_siswa_history.id = tb_transaksi.id_aktor AND tb_transaksi.jenis_aktor = 'siswa'", "LEFT")->join('tb_siswa', "tb_siswa.id = tb_siswa_history.id_siswa", "LEFT")->join('tb_guru', "tb_guru.id = tb_transaksi.id_aktor AND tb_transaksi.jenis_aktor = 'guru'", "LEFT")->find($id);

        if (!$result) {
            setAlert('warning', 'Peringatan', 'Data tidak sesuai');
            return redirect()->to($this->link);
        }

        $detail = $this->modeltransaksidetail->where('id_transaksi', $id)->findAll();

        session()->remove($this->key_cart);
        foreach ($detail as $d) {
            $data = [
                'item' => $d['item'],
                'qty' => $d['qty'],
                'harga' => $d['harga'],
                'subtotal' => $d['subtotal'],
                'keterangan' => $d['keterangan'],
            ];

            setCart($this->key_cart, $data);
        }

        $data = [
            'title' => $this->title,
            'link' => $this->link,
            'data' => $result,
            'jenis_aktor' => $this->model->jenis_aktor,
            'kategori' => $this->modeltransakskategori->findAll(),
        ];

        return view($this->view . '/edit', $data);
    }

    public function update($id)
    {
        $result = $this->model->find($id);
        if (!$result) {
            setAlert('warning', 'Peringatan', 'Data tidak sesuai');
            return redirect()->to($this->link);
        }

        $total_nominal = 0;
        $item_detail = getCart($this->key_cart);
        foreach ($item_detail as $d) {
            $total_nominal += intval($d['subtotal']);
        }

        $data = [
            'total_nominal' => $total_nominal,
            'bayar_nominal' => 0,
            'sisa_nominal' => $total_nominal,
        ];

        $res = $this->model->update($id, $data);

        $id_transaksi = $id;

        $this->modeltransaksidetail->where('id_transaksi', $id_transaksi)->delete();

        foreach ($item_detail as $d) {
            $data_detail = [
                'id_transaksi' => $id_transaksi,
                'item' => $d['item'],
                'qty' => $d['qty'],
                'harga' => $d['harga'],
                'subtotal' => $d['subtotal'],
                'keterangan' => $d['keterangan'],
            ];


            $this->modeltransaksidetail->insert($data_detail);
        }

        session()->remove($this->key_cart);

        if ($res) {
            setAlert('success', 'Berhasil', 'Transaksi berhasil diperbarui');
        } else {
            setAlert('warning', 'Peringatan', 'Transaksi gagal diperbarui');
        }

        return redirect()->to($this->link);
    }

    public function delete($id = null)
    {
        $result = $this->model->find($id);
        if (!$result) {
            setAlert('warning', 'Peringatan', 'Data tidak sesuai');
            return redirect()->to($this->link);
        }
        if ($result['status'] == 'Lunas') {
            setAlert('warning', 'Peringatan', 'Pembayaran telah lunas, transaksi tidak bisa dihapus');
            return redirect()->to($this->link);
        }

        $this->modeltransaksidetail->where('id_transaksi', $id)->delete();

        $res = $this->model->delete($id);
        if ($res) {
            setAlert('success', 'Berhasil', 'Transaksi berhasil dihapus');
        } else {
            setAlert('warning', 'Peringatan', 'Transaksi gagal dihapus');
        }

        return redirect()->to($this->link);
    }

    public function kwitansi($id, $copy = 1)
    {
        $result = $this->model->select('tb_transaksi.*, tb_transaksi_kategori_sub.nama as nama_kategori_sub, tb_user.name as nama_user, kelas.nama as nama_kelas, jurusan.nama as nama_jurusan, tahun.nama as nama_tahun')->select("(CASE WHEN jenis_aktor = 'siswa' THEN tb_siswa.nama ELSE tb_guru.nama END) as nama_aktor")->select("(CASE WHEN jenis_aktor = 'siswa' THEN tb_siswa.nipd ELSE tb_guru.nik END) as nik")->join('tb_transaksi_kategori_sub', 'tb_transaksi_kategori_sub.id = tb_transaksi.id_kategori_sub')->join('tb_transaksi_kategori', 'tb_transaksi_kategori.id = tb_transaksi_kategori_sub.id_kategori')->join('tb_siswa_history', "tb_siswa_history.id = tb_transaksi.id_aktor AND tb_transaksi.jenis_aktor = 'siswa'", "LEFT")->join('tb_siswa', "tb_siswa.id = tb_siswa_history.id_siswa", "LEFT")->join('tb_guru', "tb_guru.id = tb_transaksi.id_aktor AND tb_transaksi.jenis_aktor = 'guru'", "LEFT")->join('tb_master_kategori as kelas', 'kelas.id = tb_siswa_history.id_kelas', 'LEFT')->join('tb_master_kategori as jurusan', 'jurusan.id = tb_siswa_history.id_jurusan', 'LEFT')->join('tb_master_kategori as tahun', 'tahun.id = tb_siswa_history.id_tahun', 'LEFT')->join('tb_user', 'tb_user.id = tb_transaksi.cid', 'LEFT')->find($id);
        if (!$result) {
            setAlert('warning', 'Peringatan', 'Data tidak sesuai');
            return redirect()->to($this->link);
        }


        $data = [
            'title' => $this->title,
            'link' => $this->link,
            'data' => $result,
            'copy' => $copy,
            'detail' => $this->modeltransaksidetail->where('id_transaksi', $id)->findAll(),
            'pembayaran' => $this->modelpembayaran->where('id_transaksi', $id)->findAll(),
            'kepala_sekolah' => $this->modeluser->where('role_id', 3)->limit(1)->orderBy('id', 'DESC')->first()
        ];

        return view($this->view . '/kwitansi', $data);
    }
}
