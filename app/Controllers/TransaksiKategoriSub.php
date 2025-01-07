<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class TransaksiKategoriSub extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

    private $model;
    private $modeltransaksikategori;
    private $link = 'transaksi_kategori_sub';
    private $view = 'transaksi_kategori_sub';
    private $title = 'Transaksi Kategori Sub';
    public function __construct()
    {
        $this->model = new \App\Models\TransaksiKategoriSubModel();
        $this->modeltransaksikategori = new \App\Models\TransaksiKategoriModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
            'link' => $this->link,
            'data' => $this->model->select('tb_transaksi_kategori_sub.*, tb_transaksi_kategori.nama as nama_kategori')->join('tb_transaksi_kategori', 'tb_transaksi_kategori.id = tb_transaksi_kategori_sub.id_kategori')->orderBy('id', 'DESC')->findAll()
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
            'is_manual' => $this->model->is_manual,
            'kategori' => $this->modeltransaksikategori->findAll(),
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
            'id_kategori' => 'required',
            'is_manual' => 'required',
        ];
        $input = $this->request->getVar();

        if (!$this->validateData($input, $rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'nama' => htmlspecialchars($this->request->getVar('nama')),
            'id_kategori' => htmlspecialchars($this->request->getVar('id_kategori')),
            'is_manual' => htmlspecialchars($this->request->getVar('is_manual')),
        ];

        $res = $this->model->save($data);
        if ($res) {
            setAlert('success', 'Berhasil', 'Kategori transaksi berhasil ditambahkan');
        } else {
            setAlert('warning', 'Peringatan', 'Kategori transaksi gagal ditambahkan');
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
            setAlert('warning', 'Peringatan', 'Data tidak sesuai');
            return redirect()->to($this->link);
        }

        $data = [
            'title' => $this->title,
            'link' => $this->link,
            'is_manual' => $this->model->is_manual,
            'data' => $result,
            'kategori' => $this->modeltransaksikategori->findAll(),
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
            setAlert('warning', 'Peringatan', 'Data tidak sesuai');
            return redirect()->to($this->link);
        }

        $rules = [
            'nama' => 'required',
            'id_kategori' => 'required',
            'is_manual' => 'required',
        ];
        $input = $this->request->getVar();

        if (!$this->validateData($input, $rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'nama' => htmlspecialchars($this->request->getVar('nama')),
            'id_kategori' => htmlspecialchars($this->request->getVar('id_kategori')),
            'is_manual' => htmlspecialchars($this->request->getVar('is_manual')),
        ];

        $res = $this->model->update($id, $data);
        if ($res) {
            setAlert('success', 'Berhasil', 'Kategori transaksi berhasil diperbarui');
        } else {
            setAlert('warning', 'Peringatan', 'Kategori transaksi gagal diperbarui');
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
            setAlert('warning', 'Peringatan', 'Data tidak sesuai');
            return redirect()->to($this->link);
        }

        $res = $this->model->delete($id);
        if ($res) {
            setAlert('success', 'Berhasil', 'Kategori transaksi berhasil dihapus');
        } else {
            setAlert('warning', 'Peringatan', 'Kategori transaksi gagal dihapus');
        }

        return redirect()->to($this->link);
    }
}
