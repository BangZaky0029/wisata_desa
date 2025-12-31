<?php

namespace App\Controllers;

use App\Models\DesaModel;
use App\Models\PaketModel;
use App\Models\EventModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    protected $desaModel, $paketModel, $eventModel, $userModel;

    public function __construct()
    {
        $this->desaModel = new DesaModel();
        $this->paketModel = new PaketModel();
        $this->eventModel = new EventModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'total_desa' => $this->desaModel->countAll(),
            'total_paket' => $this->paketModel->countAll(),
            'total_event' => $this->eventModel->countAll(),
            'total_user' => $this->userModel->countAll(),
        ];

        return view('dashboard/index', $data);
    }
}