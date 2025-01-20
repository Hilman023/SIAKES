<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class TransaksiItem extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

    private $model;
    private $modelkategorisub;
    private $link = 'transaksi_item';
    private $view = 'transaksi_item';
    private $title = 'Item Transaksi';

    public function __construct()
    {
        $this->model = new \App\Models\TransaksiItemModel();
        $this->modelkategorisub = new \App\Models\TransaksiKategoriSubModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
            'link' => $this->link,
            'data' => $this->model->select('tb_transaksi_item.*, tb_transaksi_kategori_sub.nama as nama_kategori_sub, tb_transaksi_kategori.nama as nama_kategori')->join('tb_transaksi_kategori_sub', 'tb_transaksi_kategori_sub.id = tb_transaksi_item.id_kategori_sub')->join('tb_transaksi_kategori', 'tb_transaksi_kategori.id = tb_transaksi_kategori_sub.id_kategori')->orderBy('id', 'DESC')->findAll()
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
            'kategori_sub' => $this->modelkategorisub->select('tb_transaksi_kategori_sub.*, tb_transaksi_kategori.nama as nama_kategori')->join('tb_transaksi_kategori', 'tb_transaksi_kategori_sub.id_kategori = tb_transaksi_kategori.id')->findAll(),
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
            'id_kategori_sub' => 'required',
            // 'nominal' => 'required',
            // 'qty' => 'required',
            // 'total' => 'required',
            // 'keterangan' => 'required',
        ];

        $input = $this->request->getVar();

        if (!$this->validateData($input, $rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'nama' => htmlspecialchars($this->request->getVar('nama')),
            'id_kategori_sub' => htmlspecialchars($this->request->getVar('id_kategori_sub')),
            'nominal' => htmlspecialchars($this->request->getVar('nominal')),
            'qty' => htmlspecialchars($this->request->getVar('qty')),
            'total' => htmlspecialchars($this->request->getVar('total')),
            'keterangan' => htmlspecialchars($this->request->getVar('keterangan')),
        ];


        $res = $this->model->save($data);
        if ($res) {
            setAlert('success', 'Berhasil', 'Item transaksi berhasil ditambahkan');
        } else {
            setAlert('warning', 'Peringatan', 'Item transaksi gagal ditambahakan');
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
            'data' => $result,
            'kategori_sub' => $this->modelkategorisub->select('tb_transaksi_kategori_sub.*, tb_transaksi_kategori.nama as nama_kategori ')->join('tb_transaksi_kategori', 'tb_transaksi_kategori.id = tb_transaksi_kategori_sub.id_kategori')->findAll(),
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
            'id_kategori_sub' => 'required',
            // 'nominal' => 'required',
            // 'qty' => 'required',
            // 'total' => 'required',
            // 'keterangan' => 'required',
        ];

        $input = $this->request->getVar();

        if (!$this->validateData($input, $rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'nama' => htmlspecialchars($this->request->getVar('nama')),
            'id_kategori_sub' => htmlspecialchars($this->request->getVar('id_kategori_sub')),
            'nominal' => htmlspecialchars($this->request->getVar('nominal')),
            'qty' => htmlspecialchars($this->request->getVar('qty')),
            'total' => htmlspecialchars($this->request->getVar('total')),
            'keterangan' => htmlspecialchars($this->request->getVar('keterangan')),
        ];

        $res = $this->model->update($id, $data);
        if ($res) {
            setAlert('success', 'Berhasil', 'Item transaksi berhasil diperbarui');
        } else {
            setAlert('warning', 'Peringatan', 'Item transaksi gagal diperbarui');
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
            setAlert('success', 'Berhasil', 'Item transaksi berhasil dihapus');
        } else {
            setAlert('warning', 'Peringatan', 'Item transaksi gagal dihapus');
        }

        return redirect()->to($this->link);
    }
}
