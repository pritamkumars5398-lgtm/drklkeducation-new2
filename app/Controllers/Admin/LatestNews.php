<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LatestNewsModel;

class LatestNews extends BaseController
{
    public function index()
    {
        $model = new LatestNewsModel();
        $data['news'] = $model->orderBy('display_order', 'ASC')->findAll();
        return view('admin/latest_news/index', $data);
    }

    public function add()
    {
        return view('admin/latest_news/add');
    }

    public function save()
    {
        $model = new LatestNewsModel();
        $data = [
            'title'         => $this->request->getPost('title'),
            'link'          => $this->request->getPost('link'),
            'display_order' => $this->request->getPost('display_order') ? $this->request->getPost('display_order') : 0,
            'status'        => $this->request->getPost('status'),
        ];
        $model->insert($data);
        return redirect()->to('/admin/latest-news')->with('success', 'Latest news added successfully');
    }

    public function edit($id)
    {
        $model = new LatestNewsModel();
        $data['news'] = $model->find($id);
        if (!$data['news']) {
            return redirect()->to('/admin/latest-news')->with('error', 'Latest news not found');
        }
        return view('admin/latest_news/edit', $data);
    }

    public function update($id)
    {
        $model = new LatestNewsModel();
        $data = [
            'title'         => $this->request->getPost('title'),
            'link'          => $this->request->getPost('link'),
            'display_order' => $this->request->getPost('display_order') ? $this->request->getPost('display_order') : 0,
            'status'        => $this->request->getPost('status'),
        ];
        $model->update($id, $data);
        return redirect()->to('/admin/latest-news')->with('success', 'Latest news updated successfully');
    }

    public function delete($id)
    {
        $model = new LatestNewsModel();
        $model->delete($id);
        return redirect()->to('/admin/latest-news')->with('success', 'Latest news deleted successfully');
    }
}
