<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $settings = Setting::first();
        return view('admin.settings.settings')->with('settings',$settings);
    }
    public function update()
    {
        $this->validate(request(),[
            'site_name'=>'required',
            'contact_num'=>'required',
            'contact_email'=>'required',
            'address'=>'required'
        ]);
        $settings = Setting::first();
        $settings->site_name = request()->site_name;
        $settings->contact_num = request()->contact_num;
        $settings->contact_email=request()->contact_email;
        $settings->address = request()->address;
        $settings->save();
        return redirect()->back();
    }
}
