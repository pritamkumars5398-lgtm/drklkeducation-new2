<?php

namespace App\Models;

use CodeIgniter\Model;

class WhatsappSettingModel extends Model
{
    protected $table            = 'whatsapp_settings';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['number', 'message', 'status', 'position'];
}
