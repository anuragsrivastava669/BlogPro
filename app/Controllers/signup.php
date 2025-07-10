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
        helper(['form']);

        if ($this->request->isAJAX()) {
            $userModel = new UserModel();

            $data = [
                'name'     => $this->request->getPost('name'),
                'email'    => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
            ];

            $rules = [
                'name'     => 'required|min_length[3]',
                'email'    => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[3]'
            ];

            if (!$this->validate($rules)) {
                return $this->response->setJSON([
                    'status' => 'fail',
                    'errors' => $this->validator->getErrors()
                ]);
            }

            $userModel->save($data);
            return $this->response->setJSON(['status' => 'success']);
        }

        //  return error if accessed directly without AJAX
        return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid request']);
    }
}



 