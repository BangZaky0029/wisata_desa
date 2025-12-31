<?php

namespace App\Controllers;

use App\Models\EventModel;

class EventController extends BaseController
{
    protected $eventModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
    }

    public function index()
    {
        $data = ['event' => $this->eventModel->findAll()];
        return view('event/index', $data);
    }

    public function create()
    {
        return view('event/create');
    }

    public function store()
    {
        $rules = [
            'name' => 'required|min_length[3]',
            'date' => 'required|valid_date',
            'description' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->eventModel->save([
            'name' => $this->request->getPost('name'),
            'date' => $this->request->getPost('date'),
            'description' => $this->request->getPost('description')
        ]);

        return redirect()->to('event')->with('success', 'Event berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = ['event' => $this->eventModel->find($id)];
        return view('event/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'name' => 'required|min_length[3]',
            'date' => 'required|valid_date',
            'description' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->eventModel->update($id, [
            'name' => $this->request->getPost('name'),
            'date' => $this->request->getPost('date'),
            'description' => $this->request->getPost('description')
        ]);

        return redirect()->to('event')->with('success', 'Event berhasil diupdate');
    }

    public function delete($id)
    {
        $this->eventModel->delete($id);
        return redirect()->to('event')->with('success', 'Event berhasil dihapus');
    }
}