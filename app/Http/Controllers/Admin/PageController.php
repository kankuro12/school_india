<?php

namespace App\Http\Controllers\Admin;

use App\Data;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageUpload;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    //
    public function index($type)
    {
        $pages=DB::table('pages')->where('type',$type)->select(['id','title'])->get();
        $pageType=Data::pageTypes[$type];
        return view('admin.page.index',compact('type','pages','pageType'));
        
    }

    public function add($type,Request $request){
        $pageType=Data::pageTypes[$type];
        // dd($pageType);
        if($request->getMethod()=="POST"){
            $page=new Page();
            $page->title=$request->title;
            $page->short_desc=$request->short_desc;

            if(count($pageType[2])>0){
                $data=[];
                foreach ($pageType[2] as $key => $descType) {
                    $data[$key]=$request->input($key)??"";
                }
                $page->desc=json_encode($data);
            }else{
                $page->desc=$request->desc;
            }
            $page->type=$type;

            if($request->hasFile('photo')){
                $page->image=$request->photo->store('uploads/page/'.Carbon::now()->format('Y/m/d'));
            }
            $page->save();
           
            $files=[];
            if ($request->filled('docs')) {
                foreach ($request->docs as $key => $doc) {
                    if($request->hasFile('doc_image_' . $doc)){
                        $d = new PageUpload();
                        $d->title = $request->input('doc_name_' . $doc);
                        $d->file = $request->file('doc_image_' . $doc)->store('uploads/page/' . getIDPath($page->id));
                        $d->page_id = $page->id;
                        $d->save();
                        array_push($files,$d);
                    }
                }
            }
      
            return redirect()->back()->with('message',"{$pageType[0]} Added Sucessfully");
        }else{
            return view('admin.page.add',compact('type','pageType'));
        }
    }
}
