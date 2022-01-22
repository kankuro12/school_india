<?php

use App\Models\Setting;
use Illuminate\Support\Facades\DB;

$defaults=["asdf","asdfs"];
function def($name)  {
    return \App\Data::data[$name];
}


function getIDPath($id){
      return implode('/', str_split(sprintf("%09d", $id),3));
}

function getSetting($key,$direct=false){
    $s=DB::table('settings')->where('key',$key)->select('value')->first();
    return $direct?($s!=null?$s->value:null):($s!=null?json_decode($s->value):null);
}

function setSetting($key,$value,$direct=false){
    $s=Setting::where('key',$key)->first();
    if($s==null){
        $s=new Setting();
        $s->key=$key;
    }
    if($direct){
        $s->value=$value;
    }else{

        $s->value=json_encode($value);
    }
    $s->save();
    return $s;
}