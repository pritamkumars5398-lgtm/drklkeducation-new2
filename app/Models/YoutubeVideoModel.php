<?php

namespace App\Models;

use CodeIgniter\Model;

class YoutubeVideoModel extends Model
{
    protected $table            = 'youtube_videos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title', 'youtube_link', 'status', 'created_at'];

    // Dates
    protected $useTimestamps = false;
}
