<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class DashboardController extends Controller
{
    public function registered(){

        $users = User::all();
        return view('Admin.register')->with('users',$users);
   }

    public function registeredEdit(Request $request, $id){
        $users = User::findOrFail($id);
        return view('Admin.register-edit')->with('users',$users);
   }

    public function roleRegisterUpdate(Request $request, $id){
        $users = User::find($id);

        $users->name = $request->input('username');
        $users->usertype = $request->input('usertype');

        $users->update();

        return redirect('/role-register')->with('success','Role User Update Succesfully');
   }

    public function roleDelete(Request $request,$id){
       $users = User::findOrFail($id);

       $users->delete();
    
       return redirect('/role-register')->with('success','Registered User Delete Succesfully');

   }
}
