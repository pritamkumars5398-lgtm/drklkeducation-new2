<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    

     public function index()
    {
        if(!session()->get('isLoggedIn')){
            return redirect()->to('/manager-login');
        }

        if(session()->get('admin_role') !== 'manager') {
            return redirect()->to('/coordinator/dashboard');
        }

        $studentEnquiryModel = new \App\Models\StudentEnquiryModel();
        $donationModel = new \App\Models\DonationModel();
        
        $totalDonationObj = $donationModel->selectSum('amount')->where('status', 'verified')->first();
        $totalDonation = $totalDonationObj ? $totalDonationObj['amount'] : 0;
        
        $data = [
            'title'           => 'Admin Dashboard',
            'total_members'   => 1250,
            'pending_members' => 52,
            'total_donation'  => $totalDonation,
            'student_leads'   => $studentEnquiryModel->countAllResults(),
            'events'          => 14,
            'contacts'        => 18
        ];

         return view('admin/dashboard', $data);
    }
}