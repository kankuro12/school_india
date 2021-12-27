<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssessmentController extends Controller
{
    public function add(Request $request){
        return response()->json(Assessment::create($request->except('_token')));
    }
    public function index()
    {
        $data = DB::selectOne('select
        (select GROUP_CONCAT(id,concat(":",title)) from levels) as levels,
        (select GROUP_CONCAT(id,concat(":",title)) from academic_years) as academic_years,
        (select GROUP_CONCAT(id,concat(":",level_id),concat(":",title)) from sections) as sections
        ');
        $assessments=Assessment::join('academic_years','academic_years.id','=','assessments.academic_year_id')
        ->select('academic_years.title','name','assessments.id')->get();
        return view('admin.student.assessment.index',compact('data','assessments'));
    }
}
