<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 *
 * Extend this class in any new controllers:
 * ```
 *     class Home extends BaseController
 * ```
 *
 * For security, be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */

    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Global Auth & Role Check for admin and coordinator routes
        $uri = $request->getUri()->getPath();
        
        if (strpos($uri, 'admin/') === 0 && strpos($uri, 'admin/auth/login') === false) {
            if (!session()->get('isLoggedIn')) {
                header('Location: ' . base_url('manager-login'));
                exit;
            }
            if (session()->get('admin_role') !== 'manager') {
                header('Location: ' . base_url('coordinator/dashboard'));
                exit;
            }
        }

        if (strpos($uri, 'coordinator/') === 0) {
            if (!session()->get('isLoggedIn')) {
                header('Location: ' . base_url('coordinator-login'));
                exit;
            }
            if (session()->get('admin_role') !== 'coordinator') {
                header('Location: ' . base_url('admin/dashboard'));
                exit;
            }
        }
    }
}
