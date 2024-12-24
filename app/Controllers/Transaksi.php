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
    private $modeltransaksidetail;
    private $modelsiswa;
    private $modelguru;
    private $modeltransakskategori;
    private $modeltransakskategorisub;
    private $modeljenistransaksi;
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
        $this->modeljenistransaksi = new \App\Models\JenisTransaksiModel();
        $this->modeltransaksidetail = new \App\Models\TransaksiDetailModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
            'link' => $this->link,
            'data' => $this->model->select("tb_transaksi.*, tb_transaksi_kategori.nama as nama_kategori, tb_transaksi_kategori_sub.nama as nama_kategori_sub, (CASE WHEN jenis_aktor = 'siswa' THEN tb_siswa.nama ELSE tb_guru.nama END) as nama_aktor")->join('tb_transaksi_kategori_sub', 'tb_transaksi_kategori_sub.id = tb_transaksi.id_kategori_sub')->join('tb_transaksi_kategori', 'tb_transaksi_kategori.id = tb_transaksi_kategori_sub.id_kategori')->join('tb_siswa', "tb_siswa.id = tb_transaksi.id_aktor AND tb_transaksi.jenis_aktor = 'siswa'", "LEFT")->join('tb_guru', "tb_guru.id = tb_transaksi.id_aktor AND tb_transaksi.jenis_aktor = 'guru'", "LEFT")->orderBy('id', 'DESC')->findAll()
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
        $result = $this->modeljenistransaksi->where('id_kategori_sub', $id)->findAll();
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
        $result = $this->modeljenistransaksi->select('tb_jenis_transaksi.*, is_manual')->join('tb_transaksi_kategori_sub', 'tb_transaksi_kategori_sub.id = tb_jenis_transaksi.id_kategori_sub')->where('tb_jenis_transaksi.nama', $id)->first();
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

        $def_no_transaksi = $label . '.24/12/2024/000';;

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
            setAlert('success', 'Success', 'Add Success');
        } else {
            setAlert('warning', 'Warning', 'Add Failed');
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
}
