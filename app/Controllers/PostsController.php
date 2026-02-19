<?php

namespace App\Controllers;

use App\Models\PostModel;

class PostsController extends BaseController
{
    // 1️⃣ All posts list
    public function index()
    {
        $model = new PostModel();
        $data['posts'] = $model->findAll();

        return view('posts/index', $data);
    }

    // 2️⃣ Create post form
    public function create()
    {
        return view('posts/create');
    }

    // 3️⃣ Store post (FORM SUBMIT) ✅ Validation + Success
    public function store()
    {
        $rules = [
            'title'   => 'required|min_length[3]',
            'content' => 'required|min_length[5]',
            'author'  => 'required|min_length[2]'
        ];

        if (! $this->validate($rules)) {
            return view('posts/create', [
                'validation' => $this->validator
            ]);
        }

        $model = new PostModel();
        $model->insert([
            'title'      => $this->request->getPost('title'),
            'content'    => $this->request->getPost('content'),
            'author'     => $this->request->getPost('author'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/posts')
            ->with('success', 'Post added successfully!');
    }

    // 4️⃣ Show single post
    public function show($id)
    {
        $model = new PostModel();
        $data['post'] = $model->find($id);

        return view('posts/show', $data);
    }

    // 5️⃣ Edit post form
    public function edit($id)
    {
        $model = new PostModel();
        $data['post'] = $model->find($id);

        return view('posts/edit', $data);
    }

    // 6️⃣ Update post ✅ Validation + Success
    public function update($id)
    {
        $rules = [
            'title'   => 'required|min_length[3]',
            'content' => 'required|min_length[5]',
            'author'  => 'required|min_length[2]'
        ];

        if (! $this->validate($rules)) {
            $model = new PostModel();
            return view('posts/edit', [
                'post'       => $model->find($id),
                'validation' => $this->validator
            ]);
        }

        $model = new PostModel();
        $model->update($id, [
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'author'  => $this->request->getPost('author'),
        ]);

        return redirect()->to('/posts')
            ->with('success', 'Post updated successfully!');
    }

    // 7️⃣ Delete post ✅ Success
    public function delete($id)
    {
        $model = new PostModel();
        $model->delete($id);

        return redirect()->to('/posts')
            ->with('success', 'Post deleted successfully!');
    }
}
