<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CertificateModel;

class Certificates extends BaseController
{
    public function index()
    {
        $model = new CertificateModel();
        $data['certificates'] = $model->orderBy('id', 'DESC')->findAll();
        
        return view('admin/certificates/index', $data);
    }

    public function add()
    {
        return view('admin/certificates/add');
    }

    public function save()
    {
        $model = new CertificateModel();

        $data = [
            'title'      => $this->request->getPost('title'),
            'issued_by'  => $this->request->getPost('issued_by'),
            'issue_date' => $this->request->getPost('issue_date'),
            'status'     => $this->request->getPost('status'),
        ];

        $uploadPath = ROOTPATH . 'public/imgs/certificates';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Handle certificate_file
        $certFile = $this->request->getFile('certificate_file');
        if ($certFile && $certFile->isValid() && !$certFile->hasMoved()) {
            $newName = $certFile->getRandomName();
            $certFile->move($uploadPath, $newName);
            $data['certificate_file'] = 'imgs/certificates/' . $newName;
        }

        // Handle thumbnail (optional, or we could just use the same if image)
        $thumbnail = $this->request->getFile('thumbnail');
        if ($thumbnail && $thumbnail->isValid() && !$thumbnail->hasMoved()) {
            $newName = $thumbnail->getRandomName();
            $thumbnail->move($uploadPath, $newName);
            $data['thumbnail'] = 'imgs/certificates/' . $newName;
        } else {
            // fallback: use the certificate file as thumbnail if it's an image
            if (isset($data['certificate_file'])) {
                $data['thumbnail'] = $data['certificate_file'];
            }
        }

        $model->insert($data);

        return redirect()->to('/admin/certificates')->with('success', 'Certificate added successfully.');
    }

    public function delete($id)
    {
        $model = new CertificateModel();
        $cert = $model->find($id);
        
        if($cert){
            if(!empty($cert['certificate_file']) && file_exists(FCPATH . $cert['certificate_file'])){
                unlink(FCPATH . $cert['certificate_file']);
            }
            if(!empty($cert['thumbnail']) && $cert['thumbnail'] !== $cert['certificate_file'] && file_exists(FCPATH . $cert['thumbnail'])){
                unlink(FCPATH . $cert['thumbnail']);
            }
            $model->delete($id);
        }

        return redirect()->to('/admin/certificates')->with('success', 'Certificate deleted successfully.');
    }
}
