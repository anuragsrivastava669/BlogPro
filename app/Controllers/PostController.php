<?php

namespace App\Controllers;

use App\Models\PostModel;

class PostController extends BaseController
{
    
     public function index()
    {
        
        return view('post_editor'); 
    }
     public function manage()
    {
       $postModel = new PostModel();
       $posts = $postModel->findAll();

       return view('post_manage', ['posts' => $posts]);
    }

      public function postList()
    {
        return view('post_list'); 
    }
    
    public function show()
    {
    $userId = session()->get('user_id');

    if (!$userId) {
        return redirect()->to('/login')->with('error', 'You must be logged in.');
    }

    $postModel = new PostModel();
    $posts = $postModel->where('user_id', $userId)->findAll();

    return view('post_view', ['posts' => $posts]);
    }

    public function postShow($id)
    {
        $postModel = new PostModel();
        $post = $postModel->find($id);

        if ($post) {
            return $this->response->setJSON($post);
        } else {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Post not found']);
        }
    }
    
    public function fetchPublishedPosts()
{
    $postModel = new PostModel();
    $posts = $postModel->findAll(); 

    return $this->response->setJSON($posts);
}


     public function save()
    {
    $session = session();

    $model = new PostModel();
    $id = $this->request->getPost('id');

    // Validate
    $title = $this->request->getPost('title');
    $content = $this->request->getPost('content');

    if (!$title || !$content) {
        return $this->response->setStatusCode(400)->setJSON(['error' => 'Title and Content required.']);
    }

    $data = [
        'title'   => $title,
        'content' => $content,
        'user_id' => $session->get('user_id'),
        'author'  => $session->get('user_name')
    ];

    if ($id) {
        $model->update($id, $data);
        return $this->response->setJSON(['status' => 'updated']);
    } else {
        $model->insert($data);
        return $this->response->setJSON(['status' => 'saved', 'id' => $model->insertID()]);
    }
    }

    public function view($id)
   {
    $model = new PostModel();
    $post = $model->find($id);

    if (!$post) {
        return $this->response->setStatusCode(404)->setJSON(['error' => 'Post not found']);
    }

    return $this->response->setJSON($post);
    }
    public function delete($id)
    {
    $model = new PostModel();
    $model->delete($id);
    return $this->response->setJSON(['status' => 'success']);
    }
    //fetch all posts
    public function fetchAll()
    {
        $model = new PostModel();
        return $this->response->setJSON($model->findAll());
    }
    //get a single post data
     public function getPost($id)
    {
        $model = new PostModel();
        return $this->response->setJSON($model->find($id));
    }
    //for update post
    public function update()
    {
        $model = new PostModel();
        $id = $this->request->getPost('id');
        $model->update($id, [
            'title'  => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'date'   => $this->request->getPost('date')
        ]);
        return $this->response->setJSON(['status' => 'updated']);
    }
}

       