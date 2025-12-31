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
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required'
            ];

            if (!$this->validate($rules)) {
                return view('auth/login', ['errors' => $this->validator->getErrors()]);
            }

            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $user = $this->userModel->getUserByEmail($email);

            if (!$user) {
                return view('auth/login', ['error' => 'Email tidak ditemukan']);
            }

            if (!password_verify($password, $user['password'])) {
                return view('auth/login', ['error' => 'Password salah']);
            }

            $session = session();
            $session->set([
                'user_id' => $user['id'],
                'user_name' => $user['name'],
                'user_email' => $user['email'],
                'user_role' => $user['role'],
                'logged_in' => true
            ]);

            return redirect()->to(site_url('dashboard'));
        }

        return view('auth/login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
