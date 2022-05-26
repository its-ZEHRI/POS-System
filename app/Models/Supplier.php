<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'contact',
        'address'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
