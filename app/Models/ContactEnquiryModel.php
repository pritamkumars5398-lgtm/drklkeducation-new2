<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactEnquiryModel extends Model
{
    protected $table            = 'contact_enquiries';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name', 'mobile', 'email', 'topic', 'message', 
        'status', 'admin_reply', 'replied_at', 'created_at'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
}
