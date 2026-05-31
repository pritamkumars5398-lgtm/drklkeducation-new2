<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CmsModel;

class Cms extends BaseController
{
    public function index()
    {
        $model = new CmsModel();
        $data['pages'] = $model->orderBy('id', 'DESC')->findAll();
        return view('admin/cms/index', $data);
    }

    public function edit($id)
    {
        $model = new CmsModel();
        $data['page'] = $model->find($id);
        if (!$data['page']) {
            return redirect()->to('/admin/cms')->with('error', 'Page not found');
        }
        return view('admin/cms/edit', $data);
    }

    public function update($id)
    {
        $model = new CmsModel();
        $data = [
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
        ];
        $model->update($id, $data);
        return redirect()->to('/admin/cms')->with('success', 'Page updated successfully');
    }
}
