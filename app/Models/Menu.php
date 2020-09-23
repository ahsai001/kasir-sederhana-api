<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'harga', 'id_category', 'photo'];


    public function category(){
        return $this->belongsTo('App\Models\Category', 'id_category');
    }
}
