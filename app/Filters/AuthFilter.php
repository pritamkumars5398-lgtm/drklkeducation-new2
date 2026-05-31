<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(!session()->get('isLoggedIn')){
            return redirect()->to('/manager-login');
        }

        // Optional: Check role if provided in arguments
        if ($arguments && isset($arguments[0])) {
            $requiredRole = $arguments[0];
            if (session()->get('admin_role') !== $requiredRole) {
                // If they are a coordinator trying to access manager area
                if(session()->get('admin_role') === 'coordinator') {
                    return redirect()->to('/coordinator/dashboard');
                }
                // If they are a manager trying to access coordinator area
                return redirect()->to('/admin/dashboard');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
