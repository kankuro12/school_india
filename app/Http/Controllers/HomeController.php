<?php

namespace App\Http\Controllers;

use App\Data;
use App\Models\Event;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Error\Notice;

class HomeController extends Controller
{
    //
    public function index()
    {
        $setting=getSetting('homepage');
        $abouts=DB::table('pages')->whereIn('id',$setting->about)->select('id','title','short_desc')->get();
        $news=Page::where('type','news')->take(4)->latest()->get(['id','title','short_desc','created_at','image']);
        $facilities=Page::where('type','fac')->take(4)->latest()->get(['id','title','short_desc','image']);
        $programs=Page::where('type','prog')->latest()->get(['id','title','short_desc','image']);
        $events=Event::where('end','>=',Carbon::now()->format('Y-m-d'))->select(['id','title','short_desc','addr','start','end','start_time','end_time','image'])->get();
        $notices=Page::where('type','not')->latest()->take(8)->get(['id','title']);
        // dd(Carbon::now()->format('Y-m-d'),$events);
        return view('front.pages.home',compact('notices','setting','abouts','programs','facilities','events','news'));
    }

    public function image(){
        
    }
    public function pageType($type)
    {
        $data=Page::where('type',$type)->latest()->get();
        $pageType=Data::pageTypes[$type];
        return view('front.pages.multiple.'.$type,compact('data','pageType'));
    }


    public function page($id){
        $data=Page::find($id);
        if($data->type=='fac'){
            return redirect()->route('page.type',['type'=>$data->type]);
        }
        $type=Data::pageTypes[$data->type];
        $others=Page::where('type',$data->type)->where('id','<>',$id)->take(5)->get();
        // dd($others);
        return view('front.pages.single.'.$data->type,compact('data','type','others'));
    }

    public function events(){
        $data=Event::paginate(10);
        return view('front.pages.multiple.event',compact('data'));

    }
    public function event($id){
        $data=Event::find($id);
       
        $others=Event::where('id','<>',$id)->latest()->take(5)->get();
        // dd($data);
        return view('front.pages.single.event',compact('data','others'));
    }
}
