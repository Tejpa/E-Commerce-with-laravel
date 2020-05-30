<?php

namespace LocalStore\Http\Controllers\Admin;

use Illuminate\Http\Request;
use LocalStore\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function registered()
    {
    	
    	$users = DB::table('users')->paginate(5);
    	return view('admin.registered')->with('users',$users);
    }

    public function registeredit(Request $request, $id)
    {
    	$user = DB::table('users')->find($id);
        return view('admin.registerupdate')->with('user',$user);
    }

    public function registerupdate(Request $request, $id)
    {
      $this->validate($request, [
            'name' => 'required',
            'usertype' => 'required',
        ]);
    $user = DB::table('users')->where('id',$id)
    ->update(['name' => $request->name,'usertype' => $request->usertype]);
    return redirect('/users')->with('status','Your user has been updated');
    }

    public function registerdelete($id)
    {
       $user = DB::table('users')->where('id',$id)->delete();
    return redirect('/users')->with('status','Your user has been Deleted');
    }

  
}
