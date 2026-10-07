<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['username', 'full_name', 'email', 'password', 'created_at'];

    // Get the single demo user record
    public function getDemoUser()
    {
        return $this->first();
    }

    // THIS IS THE MISSING METHOD CAUSING THE ERROR:
    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
}