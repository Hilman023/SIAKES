<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class MasterKategoriKelas extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

    private $model;
    private $link = 'master_kategori/kelas';
    private $view = 'master_kategori_kelas';
    private $title = 'Master Kategori Kelas';
    private $redirect = 'master_kategori';
    public function __construct()
    {
        $this->model = new \App\Models\MasterKategoriModel();
    }

    public function index()
    {
        //
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
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
            'jenis' => 'kelas',
        ];

        $res = $this->model->save($data);
        if ($res) {
            setAlert('success', 'Success', 'Add Success');
        } else {
            setAlert('warning', 'Warning', 'Add Failed');
        }

        return redirect()->to($this->redirect);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
