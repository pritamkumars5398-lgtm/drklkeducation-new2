<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsUpdateModel extends Model
{
    protected $table            = 'news_updates';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title', 'link', 'is_breaking', 'status', 'created_at'];

    // Dates
    protected $useTimestamps = false; // Using current_timestamp() in DB
}
