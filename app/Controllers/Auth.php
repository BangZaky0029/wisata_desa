<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = model('UserModel')->where('email', $email)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Email atau password salah');
        }

        session()->set([
            'user_id'   => $user['id'],
            'email'     => $user['email'],
            'role'      => $user['role'],
            'logged_in' => true
        ]);

        return redirect()->to('/dashboard');
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('auth/login')->with('success', 'Berhasil logout');
    }
}