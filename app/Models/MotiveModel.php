<?php

namespace App\Models;

use CodeIgniter\Model;

class MotiveModel extends Model
{
    protected $table            = 'motives';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title', 'short_title', 'description', 'image', 'status', 'created_at'];

    // Dates
    protected $useTimestamps = false; // Using default current_timestamp in DB
}
