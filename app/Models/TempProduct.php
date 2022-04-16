<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\TempProduct;

class TempProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'p_code',
        'p_price',
        'ws_price',
        's_price',
        'category_id',
        'quantity',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
