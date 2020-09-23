<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'detail_orders';
    protected $primaryKey = 'id';
    protected $fillable = ['qty', 'id_menu', 'id_order'];

    public function order(){
        return $this->belongsTo('App\Models\Order', 'id_order');
    }
}
