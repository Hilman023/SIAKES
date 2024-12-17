<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class JenisPembayaran extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

    private $model;
    private $modelkategori;
    private $link = 'jenis_pembayaran';
    private $view = 'jenis_pembayaran';
    private $title = 'Jenis Pembayaran';

    public function __construct()
    {
        $this->model = new \App\Models\JenisPembayaranModel();
        $this->modelkategori = new \App\Models\MasterKategoriModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
            'link' => $this->link,
            'data' => $this->model->select('tb_jenis_pembayaran.*, tb_master_kategori.nama as nama_kategori')->join('tb_master_kategori', 'tb_master_kategori.id = tb_jenis_pembayaran.id_master_kategori')->findAll()
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
        return redirect()->to($this->link);
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
            'kategori' => $this->modelkategori->where('jenis', 'pemasukan')->orWhere('jenis', 'pengeluaran')->findAll(),
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
            'id_master_kategori' => 'required',
            'nominal' => 'required',
        ];

        $input = $this->request->getVar();

        if (!$this->validateData($input, $rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'nama' => htmlspecialchars($this->request->getVar('nama')),
            'id_master_kategori' => htmlspecialchars($this->request->getVar('id_master_kategori')),
            'nominal' => htmlspecialchars($this->request->getVar('nominal')),
        ];


        $res = $this->model->save($data);
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
            'kategori' => $this->modelkategori->where('jenis', 'pemasukan')->orWhere('jenis', 'pengeluaran')->findAll(),
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
            'id_master_kategori' => 'required',
            'nominal' => 'required',
        ];

        $input = $this->request->getVar();


        if (!$this->validateData($input, $rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'nama' => htmlspecialchars($this->request->getVar('nama')),
            'id_master_kategori' => htmlspecialchars($this->request->getVar('id_master_kategori')),
            'nominal' => htmlspecialchars($this->request->getVar('nominal')),
        ];

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
