<?php

namespace LocalStore;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['users_id','products_id','amount','total'];

    public function Products()
    {
       return $this->belongsTo('products','products_id');
    }
}
