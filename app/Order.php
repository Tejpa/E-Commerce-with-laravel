<?php

namespace LocalStore;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['users_id','address','total'];

    public function orderItems()
    {
       return $this->belongsToMany('Product')->withpivot('amount','total');
    }
}
