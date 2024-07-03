<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ajax_create extends Model
{
    use HasFactory;
        protected $table = 'ajax_product';

    protected $fillable=[
        'name',
        'qty',
        'price',
        'description'


    ];
}
