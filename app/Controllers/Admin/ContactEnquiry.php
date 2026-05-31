<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ContactEnquiryModel;

class ContactEnquiry extends BaseController
{
    public function index()
    {
        $model = new ContactEnquiryModel();
        
        $search = $this->request->getGet('search');
        if($search){
            $data['enquiries'] = $model->groupStart()
                                       ->like('name', $search)
                                       ->orLike('mobile', $search)
                                       ->orLike('email', $search)
                                       ->groupEnd()
                                       ->orderBy('id', 'DESC')
                                       ->findAll();
        } else {
            $data['enquiries'] = $model->orderBy('id', 'DESC')->findAll();
        }

        return view('admin/contact_enquiry/index', $data);
    }

    public function view($id)
    {
        $model = new ContactEnquiryModel();
        $enquiry = $model->find($id);

        if(!$enquiry){
            return redirect()->to('/admin/contact-enquiry')->with('error', 'Enquiry not found');
        }
        
        // If status is 'new', change to 'in_progress' upon viewing
        if($enquiry['status'] == 'new'){
            $model->update($id, ['status' => 'in_progress']);
            $enquiry['status'] = 'in_progress';
        }

        $data['enquiry'] = $enquiry;
        return view('admin/contact_enquiry/view', $data);
    }

    public function reply($id)
    {
        $model = new ContactEnquiryModel();
        
        $reply = $this->request->getPost('admin_reply');
        
        $model->update($id, [
            'admin_reply' => $reply,
            'status' => 'resolved',
            'replied_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/admin/contact-enquiry')->with('success', 'Reply saved and marked as resolved.');
    }

    public function delete($id)
    {
        $model = new ContactEnquiryModel();
        $model->delete($id);

        return redirect()->to('/admin/contact-enquiry')->with('success', 'Enquiry deleted successfully.');
    }
}
