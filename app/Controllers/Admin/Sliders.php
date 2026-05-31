<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SliderModel;

class Sliders extends BaseController
{
    public function index()
    {
        $model = new SliderModel();
        $data['sliders'] = $model->orderBy('sort_order', 'ASC')->findAll();
        return view('admin/sliders/index', $data);
    }

    public function add()
    {
        return view('admin/sliders/add');
    }

    public function save()
    {
        $model = new SliderModel();
        
        $data = [
            'title'       => $this->request->getPost('title'),
            'subtitle'    => $this->request->getPost('subtitle'),
            'button_text' => $this->request->getPost('button_text'),
            'button_link' => $this->request->getPost('button_link'),
            'sort_order'  => $this->request->getPost('sort_order') ? $this->request->getPost('sort_order') : 0,
            'status'      => $this->request->getPost('status'),
        ];

        $img = $this->request->getFile('image');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(ROOTPATH . 'public/imgs/slider', $newName);
            $data['image'] = 'imgs/slider/' . $newName;
        }

        $model->insert($data);
        return redirect()->to('/admin/sliders')->with('success', 'Slider added successfully');
    }

    public function edit($id)
    {
        $model = new SliderModel();
        $data['slider'] = $model->find($id);
        if (!$data['slider']) {
            return redirect()->to('/admin/sliders')->with('error', 'Slider not found');
        }
        return view('admin/sliders/edit', $data);
    }

    public function update($id)
    {
        $model = new SliderModel();
        $slider = $model->find($id);

        $data = [
            'title'       => $this->request->getPost('title'),
            'subtitle'    => $this->request->getPost('subtitle'),
            'button_text' => $this->request->getPost('button_text'),
            'button_link' => $this->request->getPost('button_link'),
            'sort_order'  => $this->request->getPost('sort_order') ? $this->request->getPost('sort_order') : 0,
            'status'      => $this->request->getPost('status'),
        ];

        $img = $this->request->getFile('image');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            // Delete old image if exists
            if (!empty($slider['image']) && file_exists(ROOTPATH . 'public/' . $slider['image'])) {
                unlink(ROOTPATH . 'public/' . $slider['image']);
            }
            $newName = $img->getRandomName();
            $img->move(ROOTPATH . 'public/imgs/slider', $newName);
            $data['image'] = 'imgs/slider/' . $newName;
        }

        $model->update($id, $data);
        return redirect()->to('/admin/sliders')->with('success', 'Slider updated successfully');
    }

    public function delete($id)
    {
        $model = new SliderModel();
        $slider = $model->find($id);
        if ($slider) {
            if (!empty($slider['image']) && file_exists(ROOTPATH . 'public/' . $slider['image'])) {
                unlink(ROOTPATH . 'public/' . $slider['image']);
            }
            $model->delete($id);
        }
        return redirect()->to('/admin/sliders')->with('success', 'Slider deleted successfully');
    }
}
