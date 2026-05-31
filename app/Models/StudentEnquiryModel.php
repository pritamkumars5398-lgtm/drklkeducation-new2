<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentEnquiryModel extends Model
{
    protected $table = 'student_enquiries';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'mobile',
        'email',
        'city',
        'course',
        'percentage',
        'message',
        'status'
    ];
}