<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    //untuk menyambung ke table users
    protected $table = 'users';
    protected $guarded = ['id'];
}
