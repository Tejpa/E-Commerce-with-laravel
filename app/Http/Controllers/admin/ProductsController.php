<?php

namespace LocalStore\Http\Controllers\Admin;

use Illuminate\Http\Request;
use LocalStore\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {
    	$products = DB::table('products')->paginate(6);
    	return view('admin.index',['products' => $products]);
    } 

    public  function create()
    {
    	return view('admin.product.create');
    }

    public function store(Request $request)
    {
       $this->validate($request,[
          'p_title' => 'required',
          'p_name' => 'required',
          'p_description' => 'required',
          'p_price' => 'required',
          'p_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
        $image = $request->file('p_image');
        $Product_image = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('/img/product_image'), $Product_image);
     
      $products = DB::table('products')
       ->insert(['p_title' => $request->input('p_title'),'p_name' => $request->input('p_name'),'p_description' => $request->input('p_description'),'p_price' => $request->input('p_price'),'p_image' =>  $Product_image]);

       return redirect('/products/create')->with('status','Product Added Successfully');
    }

    public function adminproindex()
    {
        $products = DB::table('products')->paginate(5);
    	return view('admin.product.adminproindex',['products' => $products]);
    }
    public function productedit(Request $request, $id)
    {
      $products = DB::table('products')->find($id);
      return view('admin.product.edit')->with('products',$products);
    }
    public function productupdate(Request $request, $id){
         $this->validate($request,[
         	 'p_title' => 'required',
         	 'p_name' => 'required',
         	 'p_price' => 'required',
         ]);
        $products = DB::table('products')->where('id',$id)
        ->update(['p_title' => $request->p_title, 'p_name' => $request->p_name,'p_price' => $request->p_price]); 
        return redirect('products/proindex')->with('status','Your Product has been updated');
    }

    public function delete($id)
    {
       $products = DB::table('products')->where('id',$id)->delete();
        return redirect('products/proindex')->with('status','Product has been Successfully deleted.');
    }
}
