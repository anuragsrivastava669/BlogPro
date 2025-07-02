<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Signup extends BaseController
{
    public function index()
    {
        return view('signup'); // It loads app/Views/signup.php
    }

    public function register()
    {
        $userModel = new UserModel();

        $data = [
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        $userModel->save($data);

        return redirect()->to('/login')->with('success', 'Registered Successfully!');
    }
}
