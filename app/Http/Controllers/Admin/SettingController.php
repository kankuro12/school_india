<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
                file_put_contents(resource_path('views\front\layout\\'.$type.'.blade.php'),view('admin.setting.template.'.$type,compact('curdata'))->render());
            }
            return redirect()->back();
        
        }else{
            return view('admin.setting.index',compact('data','type'));
        }
    }

}
