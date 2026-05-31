<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberRenewalModel extends Model
{
    protected $table            = 'member_renewals';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'member_id', 'membership_id', 'full_name', 'payment_mode', 'payment_receipt', 
        'amount', 'status', 'approved_by', 'approved_at', 'created_at'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
}
