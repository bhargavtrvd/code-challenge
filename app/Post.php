<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'id' ,
        'Person_fname' ,
        'Person_sname',
        'age',
        'Street_no',
        'Street_name',
        'Postal_code',
        'City',
        'Car_brand',
        'Car_color',
        'Car_plate'

    ];
} 