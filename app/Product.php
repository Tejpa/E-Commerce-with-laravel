<?php

namespace LocalStore;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable = [
       'p_title','p_name','p_description','p_price','p_image',
    ];
}
