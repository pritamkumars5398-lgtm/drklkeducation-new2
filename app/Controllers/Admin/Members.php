<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MemberModel;

class Members extends BaseController
{
    public function index()
    {
        $model = new MemberModel();

        $search = $this->request->getGet('search');

        if($search){
            $data['members'] = $model
            ->groupStart()
                ->like('full_name',$search)
                ->orLike('mobile',$search)
            ->groupEnd()
            ->where('status', 'approved')
            ->findAll();
        }else{
            $data['members'] = $model->where('status', 'approved')->orderBy('id','DESC')->findAll();
        }

        return view('admin/members/list',$data);
    }

    public function applications()
    {
        $model = new MemberModel();

        $search = $this->request->getGet('search');

        if($search){
            $data['members'] = $model
            ->groupStart()
                ->like('full_name',$search)
                ->orLike('mobile',$search)
            ->groupEnd()
            ->where('status', 'pending')
            ->findAll();
        }else{
            $data['members'] = $model->where('status', 'pending')->orderBy('id','DESC')->findAll();
        }

        return view('admin/members/applications',$data);
    }

    public function renewals()
    {
        $model = new \App\Models\MemberRenewalModel();
        $memberModel = new MemberModel();

        // Join member_renewals with members to get member details
        // Since we need city, email, mobile which are in members table.
        // Or we can just join it manually or fetch it.
        $db = \Config\Database::connect();
        $builder = $db->table('member_renewals mr');
        $builder->select('mr.*, m.mobile, m.email, m.city, m.state');
        $builder->join('members m', 'm.id = mr.member_id');
        
        $search = $this->request->getGet('search');
        if($search){
            $builder->groupStart()
                ->like('mr.full_name', $search)
                ->orLike('m.mobile', $search)
            ->groupEnd();
        }
        $builder->orderBy('mr.id', 'DESC');
        $data['renewals'] = $builder->get()->getResultArray();

        return view('admin/members/renewals', $data);
    }

    public function view($id)
    {
        $model = new MemberModel();
        $data['member'] = $model->find($id);

        return view('admin/members/view', $data);
    }

    public function approve($id)
    {
        $model = new MemberModel();
        $member = $model->find($id);
        $redirectUrl = '/admin/members/applications';
        $model->update($id,['status'=>'approved']);

        return redirect()->to($redirectUrl);
    }

    public function reject($id)
    {
        $model = new MemberModel();
        $member = $model->find($id);
        $redirectUrl = '/admin/members/applications';
        $model->update($id,['status'=>'rejected']);

        return redirect()->to($redirectUrl);
    }

    public function approveRenewal($id)
    {
        $renewalModel = new \App\Models\MemberRenewalModel();
        $memberModel = new MemberModel();

        $renewal = $renewalModel->find($id);
        if ($renewal && $renewal['status'] === 'pending') {
            $renewalModel->update($id, [
                'status' => 'approved',
                'approved_by' => session()->get('admin_id'),
                'approved_at' => date('Y-m-d H:i:s')
            ]);
            
            // Set member status back to approved and update payment details if needed
            $memberModel->update($renewal['member_id'], [
                'status' => 'approved'
            ]);
        }

        return redirect()->to('/admin/members/renewals')->with('success', 'Renewal request approved.');
    }

    public function rejectRenewal($id)
    {
        $renewalModel = new \App\Models\MemberRenewalModel();
        $memberModel = new MemberModel();

        $renewal = $renewalModel->find($id);
        if ($renewal && $renewal['status'] === 'pending') {
            $renewalModel->update($id, [
                'status' => 'rejected',
                'approved_by' => session()->get('admin_id'),
                'approved_at' => date('Y-m-d H:i:s')
            ]);

            // Optional: Leave member status as pending_renewal or revert?
            // Reverting to 'approved' or 'rejected' based on logic. Usually, if renewal is rejected, member might become inactive, or stay pending_renewal.
            // Let's set it back to approved but with a note, or leave as pending_renewal.
            $memberModel->update($renewal['member_id'], [
                'status' => 'approved' 
            ]);
        }

        return redirect()->to('/admin/members/renewals')->with('success', 'Renewal request rejected.');
    }

    public function delete($id)
    {
        $model = new MemberModel();
        $model->delete($id);

        return redirect()->to('/admin/members');
    }

    public function add()
    {
        return view('admin/members/add');
    }

    public function save()
    {
        $model = new MemberModel();
        $data = [
            'full_name'   => $this->request->getPost('full_name'),
            'gender'      => $this->request->getPost('gender'),
            'dob'         => $this->request->getPost('dob'),
            'father_name' => $this->request->getPost('father_name'),
            'blood_group' => $this->request->getPost('blood_group'),
            'occupation'  => $this->request->getPost('occupation'),
            'mobile'      => $this->request->getPost('mobile'),
            'aadhar_no'   => $this->request->getPost('aadhar_no'),
            'email'       => $this->request->getPost('email'),
            'address'     => $this->request->getPost('address'),
            'pincode'     => $this->request->getPost('pincode'),
            'city'        => $this->request->getPost('city'),
            'district'    => $this->request->getPost('district'),
            'state'       => $this->request->getPost('state'),
            'status'      => $this->request->getPost('status') ?? 'pending',
            'id_type'     => $this->request->getPost('id_type'),
        ];

        $uploadPath = ROOTPATH . 'public/imgs/member';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $files = ['photo', 'id_document', 'other_document', 'payment_receipt'];
        foreach ($files as $file) {
            $uploadedFile = $this->request->getFile($file);
            if ($uploadedFile && $uploadedFile->isValid() && !$uploadedFile->hasMoved()) {
                $newName = $uploadedFile->getRandomName();
                $uploadedFile->move($uploadPath, $newName);
                $data[$file] = 'imgs/member/' . $newName;
            }
        }

        $model->insert($data);
        return redirect()->to('/admin/members');
    }

    public function edit($id)
    {
        $model = new MemberModel();
        $data['member'] = $model->find($id);
        return view('admin/members/edit', $data);
    }

    public function update($id)
    {
        $model = new MemberModel();
        $data = [
            'full_name'   => $this->request->getPost('full_name'),
            'gender'      => $this->request->getPost('gender'),
            'dob'         => $this->request->getPost('dob'),
            'father_name' => $this->request->getPost('father_name'),
            'blood_group' => $this->request->getPost('blood_group'),
            'occupation'  => $this->request->getPost('occupation'),
            'mobile'      => $this->request->getPost('mobile'),
            'aadhar_no'   => $this->request->getPost('aadhar_no'),
            'email'       => $this->request->getPost('email'),
            'address'     => $this->request->getPost('address'),
            'pincode'     => $this->request->getPost('pincode'),
            'city'        => $this->request->getPost('city'),
            'district'    => $this->request->getPost('district'),
            'state'       => $this->request->getPost('state'),
            'status'      => $this->request->getPost('status') ?? 'pending',
            'id_type'     => $this->request->getPost('id_type'),
        ];

        $uploadPath = ROOTPATH . 'public/imgs/member';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $files = ['photo', 'id_document', 'other_document', 'payment_receipt'];
        foreach ($files as $file) {
            $uploadedFile = $this->request->getFile($file);
            if ($uploadedFile && $uploadedFile->isValid() && !$uploadedFile->hasMoved()) {
                $newName = $uploadedFile->getRandomName();
                $uploadedFile->move($uploadPath, $newName);
                $data[$file] = 'imgs/member/' . $newName;
            }
        }

        $model->update($id, $data);
        return redirect()->to('/admin/members');
    }
}