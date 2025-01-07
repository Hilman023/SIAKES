<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class MasterKategoriJurusan extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

    private $model;
    private $link = 'master_kategori/jurusan';
    private $view = 'master_kategori_jurusan';
    private $title = 'Master Kategori Jurusan';
    private $jenis = 'jurusan';
    private $redirect = 'master_kategori';
    public function __construct()
    {
        $this->model = new \App\Models\MasterKategoriModel();
    }

    public function index()
    {
        return redirect()->to($this->redirect);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        return redirect()->to($this->redirect);
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
        ];

        $input = $this->request->getVar();

        if (!$this->validateData($input, $rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'nama' => htmlspecialchars($this->request->getVar('nama')),
            'jenis' => $this->jenis,
        ];

        $res = $this->model->save($data);
        if ($res) {
            setAlert('success', 'Berhasil', 'Jurusan sekolah berhasil ditambahakan');
        } else {
            setAlert('warning', 'Peringatan', 'Jurusan sekolah gagal ditambahakan');
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
        $result = $this->model->where('jenis', $this->jenis)->find($id);
        if (!$result) {
            setAlert('warning', 'Peringatan', 'Data tidak sesuai');
            return redirect()->to($this->link);
        }

        $data = [
            'title' => $this->title,
            'link' => $this->link,
            'data' => $result,
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
        $result = $this->model->where('jenis', $this->jenis)->find($id);
        if (!$result) {
            setAlert('warning', 'Peringatan', 'Data tidak sesuai');
            return redirect()->to($this->link);
        }

        $rules = [
            'nama' => 'required',
        ];

        $input = $this->request->getVar();

        if (!$this->validateData($input, $rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'nama' => htmlspecialchars($this->request->getVar('nama')),
            'jenis' => $this->jenis,
        ];

        $res = $this->model->update($id, $data);
        if ($res) {
            setAlert('success', 'Berhasil', 'Jurusan sekolah berhasil diperbarui');
        } else {
            setAlert('warning', 'Peringatan', 'Jurusan sekolah gagal diperbarui');
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
        $result = $this->model->where('jenis', $this->jenis)->find($id);
        if (!$result) {
            setAlert('warning', 'Peringatan', 'Data tidak sesuai');
            return redirect()->to($this->link);
        }

        $res = $this->model->delete($id);
        if ($res) {
            setAlert('success', 'Success', 'Jurusan sekolah berhasil dihapus');
        } else {
            setAlert('warning', 'Peringatan', 'Jurusan sekolah gagal dihapus');
        }

        return redirect()->to($this->link);
    }
}
