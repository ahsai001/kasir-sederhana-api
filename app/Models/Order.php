<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = ['total_harga', 'total_bayar', 'total_kembali', 'no_meja', 'id_user'];

    public function user(){
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function order_details(){
        return $this->hasMany('App\Models\OrderDetail', 'id_order');
    }
}
