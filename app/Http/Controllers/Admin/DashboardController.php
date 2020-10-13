<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    public function registered(){
        $users = User::all();
        return \view('admin.register', \compact('users'));
    }

    public function edited($id){
        $users = User::whereId($id)->firstOrFail();
        return \view('admin.edit', \compact('users'));
    }

    public function updated(Request $request, $id){
        $users = User::whereId($id)->firstOrFail();
        $users->name = $request->input('name');
        $users->usertype = $request->input('usertype');
        $users->update();

        return \redirect('/register-role')->with('success','Updated Successfully');
    }

    public function deleted($id){
        $users = User::whereId($id)->firstOrFail();
        $users->delete();

        return \redirect('/register-role')->with('success','Deleted Successfully');
    }
}
