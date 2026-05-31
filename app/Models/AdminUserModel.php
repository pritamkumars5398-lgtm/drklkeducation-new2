<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminUserModel extends Model
{
    protected $table = 'admin_users';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'full_name',
        'email',
        'mobile',
        'username',
        'password',
        'role',
        'status'
    ];
}