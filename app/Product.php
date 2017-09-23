<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /*Tells explicit to set as interger */
    protected $casts =[
      'price' => 'interger'
    ];
}
