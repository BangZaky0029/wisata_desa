<?php

namespace App\Controllers;

use App\Models\PaketModel;
use App\Models\DesaModel;

class PaketController extends BaseController
{
    protected $paketModel, $desaModel;

    public function __construct()
    {
        $this->paketModel = new PaketModel();
        $this->desaModel = new DesaModel();
    }

    public function index()
    {
        $data = ['paket' => $this->paketModel->getPaketWithDesa()];
        return view('paket/index', $data);
    }

    public function create()
    {
        $data = ['desa' => $this->desaModel->findAll()];
        return view('paket/create', $data);
    }

    public function store()
    {
        $rules = [
            'desa_id' => 'required',
            'name' => 'required|min_length[3]',
            'price' => 'required|numeric',
            'description' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->paketModel->save([
            'desa_id' => $this->request->getPost('desa_id'),
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'description' => $this->request->getPost('description')
        ]);

        return redirect()->to('paket')->with('success', 'Paket berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = [
            'paket' => $this->paketModel->find($id),
            'desa' => $this->desaModel->findAll()
        ];
        return view('paket/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'desa_id' => 'required',
            'name' => 'required|min_length[3]',
            'price' => 'required|numeric',
            'description' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->paketModel->update($id, [
            'desa_id' => $this->request->getPost('desa_id'),
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'description' => $this->request->getPost('description')
        ]);

        return redirect()->to('paket')->with('success', 'Paket berhasil diupdate');
    }

    public function delete($id)
    {
        $this->paketModel->delete($id);
        return redirect()->to('paket')->with('success', 'Paket berhasil dihapus');
    }
}