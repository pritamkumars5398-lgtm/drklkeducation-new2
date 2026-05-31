<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\NewsUpdateModel;

class NewsUpdates extends BaseController
{
    public function index()
    {
        $model = new NewsUpdateModel();
        $data['news'] = $model->orderBy('id', 'DESC')->findAll();
        return view('admin/news_updates/index', $data);
    }

    public function add()
    {
        return view('admin/news_updates/add');
    }

    public function save()
    {
        $model = new NewsUpdateModel();
        $data = [
            'title'       => $this->request->getPost('title'),
            'link'        => $this->request->getPost('link'),
            'is_breaking' => $this->request->getPost('is_breaking') ? 1 : 0,
            'status'      => $this->request->getPost('status'),
        ];
        $model->insert($data);
        return redirect()->to('/admin/news-updates')->with('success', 'News update added successfully');
    }

    public function edit($id)
    {
        $model = new NewsUpdateModel();
        $data['news'] = $model->find($id);
        if (!$data['news']) {
            return redirect()->to('/admin/news-updates')->with('error', 'News update not found');
        }
        return view('admin/news_updates/edit', $data);
    }

    public function update($id)
    {
        $model = new NewsUpdateModel();
        $data = [
            'title'       => $this->request->getPost('title'),
            'link'        => $this->request->getPost('link'),
            'is_breaking' => $this->request->getPost('is_breaking') ? 1 : 0,
            'status'      => $this->request->getPost('status'),
        ];
        $model->update($id, $data);
        return redirect()->to('/admin/news-updates')->with('success', 'News update updated successfully');
    }

    public function delete($id)
    {
        $model = new NewsUpdateModel();
        $model->delete($id);
        return redirect()->to('/admin/news-updates')->with('success', 'News update deleted successfully');
    }
}
