<?php

namespace App\Models;

use CodeIgniter\Model;

class EventBookingModel extends Model
{
    protected $table            = 'event_bookings';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['event_id', 'full_name', 'mobile', 'email', 'city', 'is_member', 'member_id', 'seats', 'status', 'remarks', 'created_at', 'approved_by', 'approved_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
