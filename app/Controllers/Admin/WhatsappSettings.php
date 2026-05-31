<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\WhatsappSettingModel;

class WhatsappSettings extends BaseController
{
    public function index()
    {
        $model = new WhatsappSettingModel();
        $data['settings'] = $model->find(1);
        
        if (!$data['settings']) {
            // Create default if not exists
            $model->insert([
                'id' => 1,
                'number' => '919876543210',
                'message' => 'Hello!',
                'status' => 'active',
                'position' => 'right'
            ]);
            $data['settings'] = $model->find(1);
        }

        return view('admin/whatsapp_settings/index', $data);
    }

    public function update()
    {
        $model = new WhatsappSettingModel();
        $data = [
            'number'   => $this->request->getPost('number'),
            'message'  => $this->request->getPost('message'),
            'status'   => $this->request->getPost('status'),
            'position' => $this->request->getPost('position'),
        ];

        $model->update(1, $data);
        return redirect()->to('/admin/whatsapp-settings')->with('success', 'WhatsApp settings updated successfully');
    }
}
