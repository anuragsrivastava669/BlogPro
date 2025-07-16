<?php

namespace App\Controllers;

use App\Models\PostModel;

class AuthorController extends BaseController
{
    public function index()
    {
        $userId = session('user_id'); 

       if (!$userId) {
        return redirect()->to('/login'); 
       }
        return view('author_page');
    }

    public function fetchPosts()
   {
    $userId = session('user_id');

    if (!$userId) {
        log_message('error', 'User ID not found in session.');
        return $this->response->setJSON([]);
    }

    log_message('info', 'Fetching posts for user ID: ' . $userId);

    $postModel = new PostModel();
    $posts = $postModel->where('user_id', $userId)->findAll();


    return $this->response->setJSON($posts);
   }

}
