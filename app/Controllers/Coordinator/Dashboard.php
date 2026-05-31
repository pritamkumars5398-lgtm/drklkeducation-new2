<?php

namespace App\Controllers\Coordinator;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        if(!session()->get('isLoggedIn')){
            return redirect()->to('/coordinator-login');
        }

        if(session()->get('admin_role') !== 'coordinator') {
            return redirect()->to('/admin/dashboard');
        }

        $data = [

            'title' => 'Coordinator Dashboard',

            'total_members'   => 1250,
            'pending_members' => 52,
            'total_donation'  => 84500,
            'student_leads'  => 111,
            'events'          => 14,
            'contacts'        => 18

        ];

        return view('coordinator/dashboard', $data);
    }
}