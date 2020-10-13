<?php

namespace App\Http\Controllers\Admin;

use App\Models\Aboutus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class AboutusController extends Controller
{
    public function index(){
        $aboutus = Aboutus::all();
        return \view('admin.aboutus', \compact('aboutus')); 
        }

    public function store(Request $request){

        $aboutus = new Aboutus;

        $aboutus->title = $request->input('title');
        $aboutus->subtitle = $request->input('subtitle');
        $aboutus->description = $request->input('description');

        $aboutus->save();

        Session::flash('statuscode', 'success');
        return redirect('/aboutus')->with('status','Data Inserted Successfully');
    }

    public function edit($id)
    {
        $aboutus = Aboutus::whereId($id)->firstOrFail();
        return \view('aboutus.edit',\compact('aboutus'));
    }

    public function update(Request $request, $id)
    {
        $aboutus = Aboutus::whereId($id)->firstOrFail();
        $aboutus->title = $request->input('title');
        $aboutus->subtitle = $request->input('subtitle');
        $aboutus->description = $request->input('description');
        $aboutus->update();

        Session::flash('statuscode', 'success');
        return \redirect('/aboutus')->with('status', 'Updated Successfully');
    }

    public function delete($id)
    {
        $aboutus = Aboutus::whereId($id)->firstOrFail();
        $aboutus->delete();

        Session::flash('statuscode', 'error');
        return \redirect('/aboutus')->with('status', 'Deleted Successfully');
    }
}
