<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamSubjectController extends Controller
{
    public function index(Request $request,Exam $exam){
        if($request->getMethod()=="POST"){

        }else{
            $data = DB::selectOne('select
            (select GROUP_CONCAT(id,concat(":",title)) from levels) as levels,
            (select GROUP_CONCAT(id,concat(":",level_id),concat(":",title)) from sections) as sections
            ');
            return view('admin.exam.setup.add',compact('data','exam'));
        }
    }
}
