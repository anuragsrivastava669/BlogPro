<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        return redirect()->to('/login');
    }

    public function login()
    {
        return view('login');
    }

    public function loginUser()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid email or password.'
            ]);
        }

        if ($user === NULL) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Please verify your email before logging in.'
            ]);
        }
          
        
        // Set session
        session()->set([
            'user_id'     => $user['id'],
            'user_email'  => $user['email'],
            'user_name'   => $user['name'],
            'isLoggedIn'  => true
        ]);
        
        return $this->response->setJSON(['status' => 'success']);
    }

    public function logout()
    {
        session()->destroy();

        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Logged out successfully.'
            ]);
        }

        return redirect()->to('/login')->with('success', 'You have been logged out.');
    }
}