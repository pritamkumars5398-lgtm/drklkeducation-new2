<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CampaignModel;

class Campaigns extends BaseController
{
    public function index()
    {
        $model = new CampaignModel();
        $data['campaigns'] = $model->orderBy('id', 'DESC')->findAll();
        return view('admin/campaigns/index', $data);
    }

    public function add()
    {
        return view('admin/campaigns/add');
    }

    public function save()
    {
        $model = new CampaignModel();

        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'goal_amount' => $this->request->getPost('goal_amount'),
            'status'      => $this->request->getPost('status'),
        ];

        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/imgs/campaigns', $newName);
            $data['image'] = 'imgs/campaigns/' . $newName;
        }

        $model->insert($data);
        return redirect()->to('/admin/campaigns')->with('success', 'Campaign created successfully');
    }

    public function edit($id)
    {
        $model = new CampaignModel();
        $data['campaign'] = $model->find($id);
        if (!$data['campaign']) {
            return redirect()->to('/admin/campaigns')->with('error', 'Campaign not found');
        }
        return view('admin/campaigns/edit', $data);
    }

    public function update($id)
    {
        $model = new CampaignModel();
        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'goal_amount' => $this->request->getPost('goal_amount'),
            'status'      => $this->request->getPost('status'),
        ];

        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/imgs/campaigns', $newName);
            $data['image'] = 'imgs/campaigns/' . $newName;
        }

        $model->update($id, $data);
        return redirect()->to('/admin/campaigns')->with('success', 'Campaign updated successfully');
    }

    public function delete($id)
    {
        $model = new CampaignModel();
        $model->delete($id);
        return redirect()->to('/admin/campaigns')->with('success', 'Campaign deleted successfully');
    }
}
