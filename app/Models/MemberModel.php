<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = 'members';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'full_name',
        'father_name',
        'mobile',
        'aadhar_no',
        'email',
        'dob',
        'gender',
        'blood_group',
        'occupation',
        'address',
        'city',
        'state',
        'district',
        'pincode',
        'photo',
        'id_type',
        'id_document',
        'other_document',
        'payment_amount',
        'payment_status',
        'payment_mode',
        'payment_id',
        'payment_receipt',
        'payment_date',
        'member_code',
        'approved_by',
        'approved_at',
        'remarks',
        'status',
        'created_at'
    ];
}