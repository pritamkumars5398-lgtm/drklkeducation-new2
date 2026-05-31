<?php

namespace App\Models;

use CodeIgniter\Model;

class DonationModel extends Model
{
    protected $table            = 'donations';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields    = [
        'full_name',
        'mobile',
        'email',
        'pancard_no',
        'address',
        'photo',
        'amount',
        'custom_amount',
        'payment_mode',
        'transaction_id',
        'payment_receipt',
        'message',
        'status',
        'verified_by',
        'verified_at',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = false; 
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}
