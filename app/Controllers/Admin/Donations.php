<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DonationModel;

class Donations extends BaseController
{
    public function index()
    {
        $model = new DonationModel();

        $search = $this->request->getGet('search');

        if($search){
            $data['donations'] = $model
            ->like('full_name',$search)
            ->orLike('mobile',$search)
            ->orLike('email',$search)
            ->orderBy('id','DESC')->findAll();
        }else{
            $data['donations'] = $model->orderBy('id','DESC')->findAll();
        }

        return view('admin/donations/list', $data);
    }

    public function view($id)
    {
        $model = new DonationModel();
        $data['donation'] = $model->find($id);

        if (!$data['donation']) {
            return redirect()->to('/admin/donations')->with('error', 'Donation not found');
        }

        return view('admin/donations/view', $data);
    }

    public function approve($id)
    {
        $model = new DonationModel();
        $donation = $model->find($id);

        if (!$donation) {
            return redirect()->to('/admin/donations')->with('error', 'Donation not found');
        }

        $adminId = session()->get('id') ?? 1; // get actual admin ID if session exists
        
        $model->update($id, [
            'status' => 'verified',
            'verified_by' => $adminId,
            'verified_at' => date('Y-m-d H:i:s')
        ]);

        // If it's a campaign donation, update campaign raised amount
        if (!empty($donation['campaign_id'])) {
            $campaignModel = new \App\Models\CampaignModel();
            $campaign = $campaignModel->find($donation['campaign_id']);
            if ($campaign) {
                $newRaisedAmount = $campaign['raised_amount'] + $donation['amount'];
                $campaignModel->update($campaign['id'], [
                    'raised_amount' => $newRaisedAmount
                ]);
            }
        }

        return redirect()->to('/admin/donations')->with('success', 'Donation verified successfully');
    }

    public function reject($id)
    {
        $model = new DonationModel();
        $model->update($id, [
            'status' => 'rejected'
        ]);

        return redirect()->to('/admin/donations');
    }

    public function delete($id)
    {
        $model = new DonationModel();
        $model->delete($id);

        return redirect()->to('/admin/donations');
    }
}
