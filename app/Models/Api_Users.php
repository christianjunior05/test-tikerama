<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiUser extends Model
{
    protected $fillable = ['first_name', 'last_name', 'company', 'email', 'city', 'address', 'api_key'];
}