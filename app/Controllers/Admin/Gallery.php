<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GalleryModel;

class Gallery extends BaseController
{
    public function index()
    {
        $model = new GalleryModel();
        $data['gallery'] = $model->orderBy('id', 'DESC')->findAll();
        
        return view('admin/gallery/index', $data);
    }

    public function add()
    {
        return view('admin/gallery/add');
    }

    public function save()
    {
        $model = new GalleryModel();

        $data = [
            'title'        => $this->request->getPost('title'),
            'type'         => $this->request->getPost('type'),
            'description'  => $this->request->getPost('description'),
            'publish_date' => $this->request->getPost('publish_date') ?: date('Y-m-d'),
            'status'       => $this->request->getPost('status') ?: 'active',
            'video_url'    => $this->request->getPost('video_url'),
            'category'     => $this->request->getPost('category'),
            'is_featured'  => $this->request->getPost('is_featured') ? 1 : 0,
        ];

        $uploadPath = ROOTPATH . 'public/imgs/gallery';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $imageFile = $this->request->getFile('image');
        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            $newName = $imageFile->getRandomName();
            $imageFile->move($uploadPath, $newName);
            $data['image'] = 'imgs/gallery/' . $newName;
        }

        $model->insert($data);

        return redirect()->to('/admin/gallery')->with('success', 'Item added to gallery successfully.');
    }

    public function delete($id)
    {
        $model = new GalleryModel();
        $item = $model->find($id);
        
        if($item){
            if(!empty($item['image']) && file_exists(FCPATH . $item['image'])){
                unlink(FCPATH . $item['image']);
            }
            $model->delete($id);
        }

        return redirect()->to('/admin/gallery')->with('success', 'Gallery item deleted successfully.');
    }
}
