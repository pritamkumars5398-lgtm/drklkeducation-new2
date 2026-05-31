<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminUserModel;

class Coordinators extends BaseController
{
    public function index()
    {
        $model = new AdminUserModel();
        $data['coordinators'] = $model->where('role', 'coordinator')->orderBy('id', 'DESC')->findAll();
        
        return view('admin/coordinators/index', $data);
    }

    public function add()
    {
        return view('admin/coordinators/add');
    }

    public function save()
    {
        $model = new AdminUserModel();

        // Check if username or email already exists
        $username = $this->request->getPost('username');
        if ($model->where('username', $username)->first()) {
            return redirect()->back()->with('error', 'Username already exists!');
        }

        $data = [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'mobile'    => $this->request->getPost('mobile'),
            'username'  => $username,
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'role'      => 'coordinator',
            'status'    => $this->request->getPost('status') ?? 'active'
        ];

        $model->insert($data);

        return redirect()->to('/admin/coordinators')->with('success', 'Coordinator added successfully.');
    }

    public function edit($id)
    {
        $model = new AdminUserModel();
        $data['coordinator'] = $model->where('role', 'coordinator')->find($id);
        
        if (!$data['coordinator']) {
            return redirect()->to('/admin/coordinators')->with('error', 'Coordinator not found.');
        }

        return view('admin/coordinators/edit', $data);
    }

    public function update($id)
    {
        $model = new AdminUserModel();

        $data = [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'mobile'    => $this->request->getPost('mobile'),
            'status'    => $this->request->getPost('status') ?? 'active'
        ];

        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);
        }

        $model->update($id, $data);

        return redirect()->to('/admin/coordinators')->with('success', 'Coordinator updated successfully.');
    }

    public function delete($id)
    {
        $model = new AdminUserModel();
        $model->delete($id);

        return redirect()->to('/admin/coordinators')->with('success', 'Coordinator deleted successfully.');
    }
}
