<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    //untuk menyambung ke Table Kategori
    protected $table = 'kategoris';
    protected $guarded = ['id'];

    public function menu()
    {
        //untuk relasi ke table menu
        return $this->hasMany(Menu::class);
    }
}
