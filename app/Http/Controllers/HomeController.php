<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index()
    {
        $setting=getSetting('homepage');
        $abouts=DB::table('pages')->whereIn('id',$setting->about)->select('id','title','short_desc')->get();
        return view('front.pages.home',compact('setting'));
    }

    public function image(){
        
    }
}
