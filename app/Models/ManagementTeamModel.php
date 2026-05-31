<?php

namespace App\Models;

use CodeIgniter\Model;

class ManagementTeamModel extends Model
{
    protected $table            = 'management_team';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields    = [
        'name',
        'designation',
        'department',
        'mobile',
        'email',
        'photo',
        'description',
        'sort_order',
        'status',
        'created_at',
        'updated_at'
    ];

    // Dates
    protected $useTimestamps = false; // We can set this to false if created_at is default current_timestamp in DB
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}
