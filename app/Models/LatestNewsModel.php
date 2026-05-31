<?php

namespace App\Models;

use CodeIgniter\Model;

class LatestNewsModel extends Model
{
    protected $table            = 'latest_news';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title', 'link', 'display_order', 'status', 'created_at'];

    // Dates
    protected $useTimestamps = false;
}
