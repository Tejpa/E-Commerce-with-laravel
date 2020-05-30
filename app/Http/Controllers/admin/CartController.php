<?php

namespace LocalStore\Http\Controllers\admin;

use Illuminate\Http\Request;
use LocalStore\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
       $users_id = Auth::user()->id;
       $cart_products = DB::table('products')
       ->where('users_id' '=', $users_id)->get();

       $cart_total = DB::table('products')
       ->where('users_id' '=', $users_id)->sum('total');

       if(!$cart_products)
       {
       	 return redirect('/index')->with('status','Your Cart is Empty');
       }
       return view('product.cart')
       ->with('cart_products', $cart_products)
       ->with('cart_total',$cart_total);
    }

    public function store(Request $request)
    {
    	 $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric',
            'products' => 'required|numeric|exists:products,id'
        ]);

        if ($validator->fails()) 
        {
            return redirect('/index')
                        ->with('status','The book could not added to your cart');
        }

        $users_id = Auth::user()->id;
        $products_id = $request->input('products');
        $amount = $request->input('amount');

        $product = DB::table('products')->find('$products_id');
        $total = $amount * $products->p_price;

        $count = DB::table('carts')
           ->where('products_id', '=',$products_id)
           ->where('users_id','=',$users_id)
           ->count();
    	if($count)
    	{
    		return redirect('/index')->with('status','The book already added in your cart');
    	}

    	$AddCart = DB::table('carts')
    	       ->insert(['']);
    	       // Yha par work karna h

    }
}
