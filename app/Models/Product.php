<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'pagamentos' => 'array'
    ];

    protected $dates = ['lancamento'];

    protected $guarded = [];
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}