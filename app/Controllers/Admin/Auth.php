<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminUserModel;

class Auth extends BaseController
{
    public function managerLogin()
    {
        return view('frontend/manager_login');
    }

    public function coordinatorLogin()
    {
        return view('frontend/coordinator_login');
    }

    public function checkLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $loginType = $this->request->getPost('login_type');

        $model = new AdminUserModel();

        $user = $model->where('email', $email)
                      ->where('role', $loginType)
                      ->where('status', 1)
                      ->first();

        if($user && password_verify($password, $user['password']))
        {
            session()->set([
                'admin_id'   => $user['id'],
                'fullname'   => $user['full_name'],
                'email'      => $user['email'],
                'admin_role' => $user['role'],
                'isLoggedIn' => true
            ]);

            if($user['role'] == 'manager'){
                return redirect()->to('/admin/dashboard');
            }else{
                return redirect()->to('/coordinator/dashboard');
            }
        }

        return redirect()->back()->with('error','Invalid Login Details');
    }

    public function logout()
    {
        $role = session()->get('admin_role');
        session()->destroy();
        
        if ($role === 'coordinator') {
            return redirect()->to('/coordinator-login');
        }
        return redirect()->to('/manager-login');
    }
}