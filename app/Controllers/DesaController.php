<?php

namespace App\Controllers;

use App\Models\DesaModel;

class DesaController extends BaseController
{
    protected $desaModel;

    public function __construct()
    {
        $this->desaModel = new DesaModel();
    }

    public function index()
    {
        $data = ['desa' => $this->desaModel->findAll()];
        return view('desa/index', $data);
    }

    public function create()
    {
        return view('desa/create');
    }

    public function store()
    {
        $rules = [
            'name' => 'required|min_length[3]',
            'location' => 'required',
            'description' => 'required',
            'photo' => 'uploaded[photo]|mime_in[photo,image/jpg,image/jpeg,image/gif,image/png]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $photo = $this->request->getFile('photo');
        $photoName = $photo->getRandomName();
        $photo->move('uploads', $photoName);

        $this->desaModel->save([
            'name' => $this->request->getPost('name'),
            'location' => $this->request->getPost('location'),
            'description' => $this->request->getPost('description'),
            'photo' => $photoName
        ]);

        return redirect()->to('desa')->with('success', 'Desa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = ['desa' => $this->desaModel->find($id)];
        return view('desa/edit', $data);
    }

    public function update($id)
    {
        $desa = $this->desaModel->find($id);

        $rules = [
            'name' => 'required|min_length[3]',
            'location' => 'required',
            'description' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'location' => $this->request->getPost('location'),
            'description' => $this->request->getPost('description'),
        ];

        if ($this->request->getFile('photo')->isValid()) {
            if ($desa['photo'] && file_exists('uploads/' . $desa['photo'])) {
                unlink('uploads/' . $desa['photo']);
            }
            $photo = $this->request->getFile('photo');
            $data['photo'] = $photo->getRandomName();
            $photo->move('uploads', $data['photo']);
        }

        $this->desaModel->update($id, $data);
        return redirect()->to('desa')->with('success', 'Desa berhasil diupdate');
    }

    public function delete($id)
    {
        $desa = $this->desaModel->find($id);
        if ($desa['photo'] && file_exists('uploads/' . $desa['photo'])) {
            unlink('uploads/' . $desa['photo']);
        }
        $this->desaModel->delete($id);
        return redirect()->to('desa')->with('success', 'Desa berhasil dihapus');
    }
}