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
    private $modelsiswa;
    private $modelguru;
    private $modeltransakskategori;
    private $modeltransakskategorisub;
    private $modeljenistransaksi;
    private $link = 'transaksi';
    private $view = 'transaksi';
    private $title = 'Transaksi';
    public function __construct()
    {
        $this->model = new \App\Models\TransaksiModel();
        $this->modelsiswa = new \App\Models\SiswaModel();
        $this->modelguru = new \App\Models\GuruModel();
        $this->modeltransakskategori = new \App\Models\TransaksiKategoriModel();
        $this->modeltransakskategorisub = new \App\Models\TransaksiKategoriSubModel();
        $this->modeljenistransaksi = new \App\Models\JenisTransaksiModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
            'link' => $this->link,
            'data' => $this->model->orderBy('id', 'DESC')->findAll()
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
            'name' => 'required',
            'password' => 'required|min_length[8]',
            'email' => 'required|is_unique[users.email]|valid_email',
            'username' => 'required|is_unique[users.username]',
        ];

        $input = $this->request->getVar();

        if (!$this->validateData($input, $rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'name' => htmlspecialchars($this->request->getVar('name')),
            'email' => htmlspecialchars($this->request->getVar('email')),
            'username' => htmlspecialchars($this->request->getVar('username')),
            'role_id' => htmlspecialchars($this->request->getVar('role_id')),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];

        $res = $this->model->save($data);
        if ($res) {
            setAlert('success', 'Success', 'Add Success');
        } else {
            setAlert('warning', 'Warning', 'Add Failed');
        }

        return redirect()->to($this->link);
    }
}
