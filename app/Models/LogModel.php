<?php

namespace App\Models;

use CodeIgniter\Model;

class LogModel extends Model
{
    protected $table = 'logs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'user_name','action', 'description', 'ip_address', 'created_at'];
    protected $useTimestamps = false; 
}