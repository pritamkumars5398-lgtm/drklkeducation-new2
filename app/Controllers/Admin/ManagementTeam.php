<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ManagementTeamModel;

class ManagementTeam extends BaseController
{
    public function index()
    {
        $model = new ManagementTeamModel();

        $search = $this->request->getGet('search');

        if($search){
            $data['team'] = $model
            ->like('name',$search)
            ->orLike('mobile',$search)
            ->orderBy('sort_order','ASC')->findAll();
        }else{
            $data['team'] = $model->orderBy('sort_order','ASC')->orderBy('id','DESC')->findAll();
        }

        return view('admin/management_team/list', $data);
    }

    public function view($id)
    {
        $model = new ManagementTeamModel();
        $data['member'] = $model->find($id);

        return view('admin/management_team/view', $data);
    }

    public function add()
    {
        return view('admin/management_team/add');
    }

    public function save()
    {
        $model = new ManagementTeamModel();
        
        $data = [
            'name'        => $this->request->getPost('name'),
            'designation' => $this->request->getPost('designation'),
            'department'  => $this->request->getPost('department'),
            'mobile'      => $this->request->getPost('mobile'),
            'email'       => $this->request->getPost('email'),
            'description' => $this->request->getPost('description'),
            'sort_order'  => (int)($this->request->getPost('sort_order') ?? 0),
            'status'      => $this->request->getPost('status') ?? 'active'
        ];

        $uploadPath = ROOTPATH . 'public/imgs/member';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $photo = $this->request->getFile('photo');
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $newName = $photo->getRandomName();
            $photo->move($uploadPath, $newName);
            $data['photo'] = 'imgs/member/' . $newName;
        }

        $model->insert($data);
        return redirect()->to('/admin/managementteam');
    }

    public function edit($id)
    {
        $model = new ManagementTeamModel();
        $data['member'] = $model->find($id);
        
        return view('admin/management_team/edit', $data);
    }

    public function update($id)
    {
        $model = new ManagementTeamModel();
        
        $data = [
            'name'        => $this->request->getPost('name'),
            'designation' => $this->request->getPost('designation'),
            'department'  => $this->request->getPost('department'),
            'mobile'      => $this->request->getPost('mobile'),
            'email'       => $this->request->getPost('email'),
            'description' => $this->request->getPost('description'),
            'sort_order'  => (int)($this->request->getPost('sort_order') ?? 0),
            'status'      => $this->request->getPost('status') ?? 'active'
        ];

        $uploadPath = ROOTPATH . 'public/imgs/member';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $photo = $this->request->getFile('photo');
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $newName = $photo->getRandomName();
            $photo->move($uploadPath, $newName);
            $data['photo'] = 'imgs/member/' . $newName;
        }

        $model->update($id, $data);
        return redirect()->to('/admin/managementteam');
    }

    public function delete($id)
    {
        $model = new ManagementTeamModel();
        $model->delete($id);

        return redirect()->to('/admin/managementteam');
    }
}
