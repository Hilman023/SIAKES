<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Siswa extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

    private $model;
    private $modelkategori;
    private $modelsiswahistory;
    private $link = 'siswa';
    private $view = 'siswa';
    private $title = 'Siswa';
    public function __construct()
    {
        $this->model = new \App\Models\SiswaModel();
        $this->modelkategori = new \App\Models\MasterKategoriModel();
        $this->modelsiswahistory = new \App\Models\SiswaHistoryModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
            'link' => $this->link,
            'data' => $this->model->select('tb_siswa.*, kt_kelas.nama as nama_kelas, kt_jurusan.nama as nama_jurusan, kt_tahun.nama as nama_tahun')->join('tb_master_kategori as kt_kelas', 'kt_kelas.id = tb_siswa.id_kelas')->join('tb_master_kategori as kt_jurusan', 'kt_jurusan.id = tb_siswa.id_jurusan')->join('tb_master_kategori as kt_tahun', 'kt_tahun.id = tb_siswa.id_tahun')->orderBy('id', 'DESC')->findAll()
        ];

        return view($this->view . '/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $result = $this->model->find($id);
        if (!$result) {
            setAlert('warning', 'Warning', 'NOT VALID');
            return redirect()->to($this->link);
        }

        $data = [
            'title' => $this->title,
            'link' => $this->link,
            'data' => $result,
            'jk' => $this->model->jk,
            'history' => $this->modelsiswahistory->select('kt_kelas.nama as nama_kelas, kt_jurusan.nama as nama_jurusan, kt_tahun.nama as nama_tahun')->join('tb_master_kategori as kt_kelas', 'kt_kelas.id = tb_siswa_history.id_kelas')->join('tb_master_kategori as kt_jurusan', 'kt_jurusan.id = tb_siswa_history.id_jurusan')->join('tb_master_kategori as kt_tahun', 'kt_tahun.id = tb_siswa_history.id_tahun')->where('id_siswa', $id)->findAll(),
            'kelas' => $this->modelkategori->where('jenis', 'kelas')->findAll(),
            'jurusan' => $this->modelkategori->where('jenis', 'jurusan')->findAll(),
            'tahun' => $this->modelkategori->where('jenis', 'tahun')->orderBy('id', 'DESC')->findAll(),
        ];

        return view($this->view . '/show', $data);
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
            'jk' => $this->model->jk,
            'kelas' => $this->modelkategori->where('jenis', 'kelas')->findAll(),
            'jurusan' => $this->modelkategori->where('jenis', 'jurusan')->findAll(),
            'tahun' => $this->modelkategori->where('jenis', 'tahun')->orderBy('id', 'DESC')->findAll(),
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
            'nama' => 'required',
            'nipd' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jk' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'id_kelas' => 'required',
            'id_jurusan' => 'required',
            'id_tahun' => 'required',
        ];

        $input = $this->request->getVar();

        if (!$this->validateData($input, $rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'nama' => htmlspecialchars($this->request->getVar('nama')),
            'nipd' => htmlspecialchars($this->request->getVar('nipd')),
            'tempat_lahir' => htmlspecialchars($this->request->getVar('tempat_lahir')),
            'tanggal_lahir' => htmlspecialchars($this->request->getVar('tanggal_lahir')),
            'jk' => htmlspecialchars($this->request->getVar('jk')),
            'email' => htmlspecialchars($this->request->getVar('email')),
            'no_hp' => htmlspecialchars($this->request->getVar('no_hp')),
            'id_kelas' => htmlspecialchars($this->request->getVar('id_kelas')),
            'id_jurusan' => htmlspecialchars($this->request->getVar('id_jurusan')),
            'id_tahun' => htmlspecialchars($this->request->getVar('id_tahun')),
        ];



        $res = $this->model->save($data);

        $last_id = $this->model->limit(1)->orderBy('id', 'DESC')->first()['id'];

        $data_history = [
            'id_siswa' => $last_id,
            'id_kelas' => $data['id_kelas'],
            'id_jurusan' => $data['id_jurusan'],
            'id_tahun' => $data['id_tahun'],
        ];

        $this->modelsiswahistory->insert($data_history);

        if ($res) {
            setAlert('success', 'Success', 'Add Success');
        } else {
            setAlert('warning', 'Warning', 'Add Failed');
        }

        return redirect()->to($this->link);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $result = $this->model->find($id);
        if (!$result) {
            setAlert('warning', 'Warning', 'NOT VALID');
            return redirect()->to($this->link);
        }

        $data = [
            'title' => $this->title,
            'link' => $this->link,
            'data' => $result,
            'jk' => $this->model->jk,
            'kelas' => $this->modelkategori->where('jenis', 'kelas')->findAll(),
            'jurusan' => $this->modelkategori->where('jenis', 'jurusan')->findAll(),
            'tahun' => $this->modelkategori->where('jenis', 'tahun')->orderBy('id', 'DESC')->findAll(),
        ];

        return view($this->view . '/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $result = $this->model->find($id);
        if (!$result) {
            setAlert('warning', 'Warning', 'NOT VALID');
            return redirect()->to($this->link);
        }

        $rules = [
            'nama' => 'required',
            'nipd' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jk' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'id_kelas' => 'required',
            'id_jurusan' => 'required',
            'id_tahun' => 'required',
        ];

        $input = $this->request->getVar();

        if (!$this->validateData($input, $rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'nama' => htmlspecialchars($this->request->getVar('nama')),
            'nipd' => htmlspecialchars($this->request->getVar('nipd')),
            'tempat_lahir' => htmlspecialchars($this->request->getVar('tempat_lahir')),
            'tanggal_lahir' => htmlspecialchars($this->request->getVar('tanggal_lahir')),
            'jk' => htmlspecialchars($this->request->getVar('jk')),
            'email' => htmlspecialchars($this->request->getVar('email')),
            'no_hp' => htmlspecialchars($this->request->getVar('no_hp')),
            'id_kelas' => htmlspecialchars($this->request->getVar('id_kelas')),
            'id_jurusan' => htmlspecialchars($this->request->getVar('id_jurusan')),
            'id_tahun' => htmlspecialchars($this->request->getVar('id_tahun')),
        ];


        // update history jika beda
        if (($result['id_kelas'] != $data['id_kelas']) || ($result['id_jurusan'] != $data['id_jurusan']) || ($result['id_tahun'] != $data['id_tahun'])) {
            $data_history = [
                'id_siswa' => $id,
                'id_kelas' => $data['id_kelas'],
                'id_jurusan' => $data['id_jurusan'],
                'id_tahun' => $data['id_tahun'],
            ];

            $this->modelsiswahistory->insert($data_history);
        }

        $res = $this->model->update($id, $data);
        if ($res) {
            setAlert('success', 'Success', 'Edit Success');
        } else {
            setAlert('warning', 'Warning', 'Edit Failed');
        }

        return redirect()->to($this->link);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $result = $this->model->find($id);
        if (!$result) {
            setAlert('warning', 'Warning', 'NOT VALID');
            return redirect()->to($this->link);
        }

        $res = $this->model->delete($id);
        if ($res) {
            setAlert('success', 'Success', 'Delete Success');
        } else {
            setAlert('warning', 'Warning', 'Delete Failed');
        }

        return redirect()->to($this->link);
    }
}
