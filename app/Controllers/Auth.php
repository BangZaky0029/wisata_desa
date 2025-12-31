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
        // Jika sudah login, redirect ke dashboard
        if (session()->get('logged_in')) {
            return redirect()->to('dashboard');
        }

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required|min_length[6]'
            ];

            if (!$this->validate($rules)) {
                return view('auth/login', [
                    'errors' => $this->validator->getErrors(),
                    'email' => $this->request->getPost('email')
                ]);
            }

            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $user = $this->userModel->getUserByEmail($email);

            // Cek email ada atau tidak
            if (!$user) {
                return view('auth/login', [
                    'error' => 'Email tidak ditemukan',
                    'email' => $email
                ]);
            }

            // Cek password
            if (!password_verify($password, $user['password'])) {
                return view('auth/login', [
                    'error' => 'Password salah',
                    'email' => $email
                ]);
            }

            // Set session dengan benar
            $sessionData = [
                'user_id' => $user['id'],
                'user_name' => $user['name'],
                'user_email' => $user['email'],
                'user_role' => $user['role'],
                'logged_in' => true
            ];

            session()->set($sessionData);

            // DEBUG: Log untuk memastikan session tersimpan
            log_message('info', 'User logged in: ' . $user['email']);

            // Redirect ke dashboard
            return redirect()->to('dashboard')->with('success', 'Selamat datang ' . $user['name']);
        }

        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login')->with('success', 'Anda telah logout');
    }
}