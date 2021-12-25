<?php

namespace App\Http\Controllers\Admin;

use App\Data;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentDoc;
use App\Models\StudentRegistration;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function add(Request $r)
    {
        // getIDPath(12);
        // dd($r->all());
        if ($r->getMethod() == "POST") {
            if ($r->filled('email')) {
                if (User::where('email', $r->email)->count() > 0) {
                    throw new \Exception("Email Already Used in account", 1);
                }
            }
            if ($r->filled('no')) {
                if (Student::where('no', $r->no)->count() > 0) {
                    throw new \Exception("Student With Registration No - {$r->no} already Exists.");
                }
            }
            $s = new Student();
            $u = new User();
            $reg = new StudentRegistration();


            try {
                //general Info of Student
                if($r->filled('no')){
                    $s->no = $r->no;
                }
                $s->name = $r->name;
                $s->email = $r->email;
                $s->gender = $r->gender;
                $s->phone = $r->phone;
                $s->iq = $r->iq;
                $s->aadhar_no = $r->aadhar_no;
                $s->religion_id = $r->religion_id;
                $s->category_id = $r->category_id;
                $s->caste_id = $r->caste_id;

                //Address
                $s->country = $r->country;
                $s->state = $r->state;
                $s->district = $r->district;
                $s->tehsil = $r->tehsil;
                $s->town = $r->town;
                $s->block = $r->block;
                $s->pin = $r->pin;

                //Parent Detail
                $s->father_name = $r->father_name;
                $s->father_aadhar_no = $r->father_aadhar_no;
                $s->father_occupation = $r->father_occupation;
                $s->father_education = $r->father_education;
                $s->father_phone = $r->father_phone;
                $s->father_email = $r->father_email;
                $s->father_pan = $r->father_pan;

                $s->mother_name = $r->mother_name;
                $s->mother_aadhar_no = $r->mother_aadhar_no;
                $s->mother_occupation = $r->mother_occupation;
                $s->mother_education = $r->mother_education;
                $s->mother_phone = $r->mother_phone;
                $s->mother_email = $r->mother_email;
                $s->mother_pan = $r->mother_pan;

                $s->parent_income = $r->parent_income;

                //Gaurdian Detail
                $s->gaurdian_name = $r->gaurdian_name;
                $s->gaurdian_aadhar_no = $r->gaurdian_aadhar_no;
                $s->gaurdian_occupation = $r->gaurdian_occupation;
                $s->gaurdian_phone = $r->gaurdian_phone;
                $s->gaurdian_email = $r->gaurdian_email;

                //BPL INFO
                $s->bpl = $r->bpl??0;
                $s->bpl_Certificate_no = $r->bpl_Certificate_no;
                $s->bpl_issue_date = $r->bpl_issue_date;
                $s->bpl_authority = $r->bpl_authority;

                //Health and medical condition
                $s->is_handicap = $r->is_handicap??0;
                $s->handicap = $r->handicap;
                $s->handicap_per = $r->handicap_per??0;

                $s->is_mentally_chalanged = $r->is_mentally_chalanged??0;
                $s->mentally_chalanged = $r->mentally_chalanged;
                $s->mentally_chalanged_per = $r->mentally_chalanged_per??0;

                $s->has_genetic_disorder = $r->has_genetic_disorder??0;
                $s->genetic_disorder = $r->genetic_disorder;

                //previous School Info
                $s->prev_school = $r->prev_school;
                $s->prev_school_srn = $r->prev_school_srn;
                $s->prev_school_code = $r->prev_school_code;
                $s->prev_school_leave = $r->prev_school_leave;
                $s->prev_school_reason = $r->prev_school_reason;

                if ($r->filled('email')) {

                    $u->email = $r->email;
                    $u->password = bcrypt($r->phone);
                    $u->name = $r->name;
                    // dd($u, $s);
                    $u->save();
                    $s->user_id = $u->id;
                }
                $s->save();

                $reg->student_id = $s->id;
                $reg->academic_year_id = $r->academic_year_id;
                $reg->level_id = $r->level_id;
                $reg->section_id = $r->section_id;
                $reg->save();

                if ($r->filled('docs')) {
                    foreach ($r->docs as $key => $doc) {
                        if($r->hasFile('doc_image_' . $doc)){
                            $d = new StudentDoc();
                            $d->name = $r->input('doc_name_' . $doc);
                            $d->file = $r->file('doc_image_' . $doc)->store('uploads/student/' . getIDPath($s->id));
                            $d->student_id = $s->id;
                            $d->save();
                        }
                    }
                }
                // dd($s);
                return response()->json(['status'=>true,'memory'=>memory_get_peak_usage()]);
            } catch (\Throwable $th) {
                throw new \Exception('Memory:-'.memory_get_peak_usage().' ->'.$th->getMessage() , 1);
                if ($u->id != 0 && $u->id != null) {
                    $u->delete();
                }

                if ($s->id != 0 && $s->id != null) {
                    StudentDoc::where('student_id', $s->id)->delete();
                    StudentRegistration::where('student_id', $s->id)->delete();
                    $s->delete();
                }


            }
        } else {
            $data = DB::selectOne('select
             (select GROUP_CONCAT(id,concat(":",name)) from religions) as religions,
             (select GROUP_CONCAT(id,concat(":",name)) from schemes) as schemes,
             (select GROUP_CONCAT(id,concat(":",name)) from categories) as categories,
             (select GROUP_CONCAT(id,concat(":",name)) from castes) as castes,
             (select GROUP_CONCAT(id,concat(":",title)) from levels) as levels,
             (select GROUP_CONCAT(id,concat(":",title)) from academic_years where status=1 and is_open_for_admission=1) as academic_years,
             (select GROUP_CONCAT(id,concat(":",level_id),concat(":",title)) from sections) as sections,
             (select distinct(country) from students where country is not null ) as countries,
             (select distinct(state) from students where state is not null ) as states,
             (select distinct(district) from students where district is not null ) as districts,
             (select distinct(tehsil) from students where tehsil is not null ) as tehsils,
             (select distinct(town) from students where town is not null ) as towns,
             (select distinct(pin) from students where pin is not null ) as pins,
             (select distinct(genetic_disorder) from students where genetic_disorder is not null ) as genetic_disorders,
             (select distinct(mentally_chalanged) from students where mentally_chalanged is not null ) as mentally_chalangeds,
             (select distinct(handicap) from students where handicap is not null ) as handicaps
            ');
            // dd($data);
            return view('admin.student.add', compact('data'));
        }
    }
}
