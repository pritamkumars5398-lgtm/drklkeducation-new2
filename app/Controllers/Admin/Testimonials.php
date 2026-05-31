<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TestimonialModel;

class Testimonials extends BaseController
{
    public function index()
    {
        $model = new TestimonialModel();
        $data['testimonials'] = $model->orderBy('id', 'DESC')->findAll();
        return view('admin/testimonials/index', $data);
    }

    public function add()
    {
        return view('admin/testimonials/add');
    }

    public function save()
    {
        $model = new TestimonialModel();

        $data = [
            'name'        => $this->request->getPost('name'),
            'designation' => $this->request->getPost('designation'),
            'message'     => $this->request->getPost('message'),
            'status'      => $this->request->getPost('status'),
        ];

        $photo = $this->request->getFile('photo');
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $newName = $photo->getRandomName();
            $photo->move(ROOTPATH . 'public/imgs/testimonials', $newName);
            $data['photo'] = 'imgs/testimonials/' . $newName;
        }

        $model->insert($data);
        return redirect()->to('/admin/testimonials')->with('success', 'Testimonial added successfully');
    }

    public function edit($id)
    {
        $model = new TestimonialModel();
        $data['testimonial'] = $model->find($id);
        if (!$data['testimonial']) {
            return redirect()->to('/admin/testimonials')->with('error', 'Testimonial not found');
        }
        return view('admin/testimonials/edit', $data);
    }

    public function update($id)
    {
        $model = new TestimonialModel();
        $data = [
            'name'        => $this->request->getPost('name'),
            'designation' => $this->request->getPost('designation'),
            'message'     => $this->request->getPost('message'),
            'status'      => $this->request->getPost('status'),
        ];

        $photo = $this->request->getFile('photo');
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $newName = $photo->getRandomName();
            $photo->move(ROOTPATH . 'public/imgs/testimonials', $newName);
            $data['photo'] = 'imgs/testimonials/' . $newName;
        }

        $model->update($id, $data);
        return redirect()->to('/admin/testimonials')->with('success', 'Testimonial updated successfully');
    }

    public function delete($id)
    {
        $model = new TestimonialModel();
        $model->delete($id);
        return redirect()->to('/admin/testimonials')->with('success', 'Testimonial deleted successfully');
    }
}
