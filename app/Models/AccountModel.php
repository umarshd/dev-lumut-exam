<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model
{
    protected $table = 'account';
    protected $primaryKey = 'username';
    protected $returnType = 'array';
    protected $allowedFields =
        [
            'name',
            'password',
            'role'
        ];
}