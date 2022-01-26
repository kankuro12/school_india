<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    /*
    *0 for image
    *1 for text 
    */
    const Setting=[
        'top'=>[
            "Header Setting",[
                ['tagline',1],
                ['email',1],
                ['phone',1],
                ['name',1],
                ['logo',0],
            ]
        ]
    ];
    
    public function index($type,Request $request)
    {
        $data=self::Setting[$type];
        $curdata=[];
        if($request->getMethod()=="POST"){
            foreach ($data[1] as $key => $attr) {
                $k=$type.'_'.$attr[0];
                try {
                    if($attr[1]==1){
                       $s= setSetting($k,$request->input($k),true);
                    }else{
                       $s= setSetting($k,$request->file($k)->store('uploads/settings'),true);
                    }
                    $curdata[$attr[0]]=$s->value;
                } catch (\Throwable $th) {
                }
            }
            
            if(isset($data[2])){
                file_put_contents(resource_path($data[2]),view('admin.setting.template.'.$type,compact('curdata'))->render());
            }else{
                file_put_contents(resource_path('views/front/layout/'.$type.'.blade.php'),view('admin.setting.template.'.$type,compact('curdata'))->render());
            }
            return redirect()->back();
        
        }else{
            return view('admin.setting.index',compact('data','type'));
        }
    }

    public function homepage(Request $request){
        if($request->getMethod()=="GET"){
            $data=getSetting('homepage')??((object)([
                'program'=>'',
                'why'=>'',
                'event'=>'',
                'news'=>'',
                'about'=>[1,2]
            ]));
            // dd($data);
            $abouts=DB::table('pages')->where('type','about')->select('id','title')->get();
            return view('admin.setting.homepage',compact('data','abouts'));
 
        }else{
            $data=[
                'program'=>$request->program,
                'why'=>$request->why,
                'event'=>$request->event,
                'news'=>$request->news,
                'about'=>$request->about??[]
            ];
            setSetting('homepage',$data);
            return redirect()->back()->with('message',"Setting Saved Sucessfully");

        }

    }

}
