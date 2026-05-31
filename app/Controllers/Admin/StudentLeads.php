<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StudentEnquiryModel;

class StudentLeads extends BaseController
{
    public function index()
    {
        $model = new StudentEnquiryModel();

        $search = $this->request->getGet('search');

        if($search){
            $data['leads'] = $model
            ->like('name',$search)
            ->orLike('mobile',$search)
            ->orLike('course',$search)
            ->findAll();
        }else{
            $data['leads'] = $model->orderBy('id','DESC')->findAll();
        }

        return view('admin/student_leads/list', $data);
    }

    public function view($id)
    {
        $model = new StudentEnquiryModel();
        $data['lead'] = $model->find($id);

        if (!$data['lead']) {
            return redirect()->to('/admin/studentleads')->with('error', 'Lead not found');
        }

        // Optional: Assuming opening the view marks it as 'read' or processable if it was pending
        // if ($data['lead']['status'] === '0') {
        //     $model->update($id, ['status' => 1]); // uncomment if status 0 means unread, 1 means read
        // }

        return view('admin/student_leads/view', $data);
    }

    public function status($id, $status)
    {
        // status values based on DB. Currently it's tinyint(4), default 0
        // Lets treat 0 = pending, 1 = contacted/processed, 2 = closed/rejected
        $model = new StudentEnquiryModel();
        $model->update($id, ['status' => $status]);

        return redirect()->to('/admin/studentleads');
    }

    public function delete($id)
    {
        $model = new StudentEnquiryModel();
        $model->delete($id);

        return redirect()->to('/admin/studentleads');
    }
}
