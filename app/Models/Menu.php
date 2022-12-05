<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    //untuk menyambung ke table menus
    protected $table = 'menus';
    protected $guarded = ['id'];

    public function kategori()
    {
        //untuk mengambil relasi ke Kategori
        return $this->belongsTo(Kategori::class);
    }
}
