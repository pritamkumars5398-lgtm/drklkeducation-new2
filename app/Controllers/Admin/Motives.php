<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MotiveModel;

class Motives extends BaseController
{
    public function index()
    {
        $model = new MotiveModel();
        $data['motives'] = $model->orderBy('id', 'DESC')->findAll();
        return view('admin/motives/index', $data);
    }

    public function add()
    {
        return view('admin/motives/add');
    }

    public function save()
    {
        $model = new MotiveModel();

        $data = [
            'title'       => $this->request->getPost('title'),
            'short_title' => $this->request->getPost('short_title'),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status'),
        ];

        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/imgs/objective', $newName);
            $data['image'] = 'imgs/objective/' . $newName;
        }

        $model->insert($data);
        return redirect()->to('/admin/motives')->with('success', 'Motive added successfully');
    }

    public function edit($id)
    {
        $model = new MotiveModel();
        $data['motive'] = $model->find($id);
        if (!$data['motive']) {
            return redirect()->to('/admin/motives')->with('error', 'Motive not found');
        }
        return view('admin/motives/edit', $data);
    }

    public function update($id)
    {
        $model = new MotiveModel();
        $data = [
            'title'       => $this->request->getPost('title'),
            'short_title' => $this->request->getPost('short_title'),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status'),
        ];

        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/imgs/objective', $newName);
            $data['image'] = 'imgs/objective/' . $newName;
        }

        $model->update($id, $data);
        return redirect()->to('/admin/motives')->with('success', 'Motive updated successfully');
    }

    public function delete($id)
    {
        $model = new MotiveModel();
        $model->delete($id);
        return redirect()->to('/admin/motives')->with('success', 'Motive deleted successfully');
    }
}
