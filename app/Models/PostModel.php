<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'title',
        'content',
        'author',
        'created_at'
    ];

    protected $useTimestamps = false;
}
