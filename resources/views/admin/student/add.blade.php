@extends('admin.layout.app')
@section('css')
<link rel="stylesheet" href="{{asset('admin/plugins/drophify/css/dropify.min.css')}}">
<style>
    .col-md-3{
        margin-bottom:10px;
    }
    .no-change{
        margin-right:5px;
    }

    .form-control{
        padding: 0.375rem 0.75rem !important;
    }
</style>
@endsection
@section('page-option')
@endsection
@section('s-title')
    <li class="breadcrumb-item">
        <a href="{{route('admin.employee.index')}}">Employees</a>
    </li>
    <li class="breadcrumb-item active">
        Add
    </li>
@endsection
@section('content')
    <script>
        _data={!! json_encode($data,true) !!};
        data=getData(_data);
        renderDataList("pin",data.pins);
        renderDataList("country",data.countries);
        renderDataList("state",data.states);
        renderDataList("district",data.districts);
        renderDataList("tehsils",data.tehsils);
        renderDataList("genetic_disorder",data.genetic_disorders);
        renderDataList("mentally_chalanged",data.mentally_chalangeds);
        renderDataList("handicap",data.handicaps);
        gender={!! json_encode(\App\Data::data['gender'])!!};;
    </script>

    <div >

    </div>
    <div class="card shadow mb-3">
        <div class="card-body">
           <form action="{{route('admin.student.add')}}" id="add-student" method="post" enctype="multipart/form-data"
                @csrf
                <div class="row">
                    <div class="col-md-12 card-title">
                        General Info
                    </div>
                    <div class="col-md-3">
                        
                        <label for="academic_year_id"> <input  type="checkbox" value="1" class="no_change" data-id="academic_year_id" > Academic Year</label>
                        <select name="academic_year_id" id="academic_year_id" class="form-control" >
                            <script>
                                document.write(getOptions(data.academic_years));
                            </script>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="no">Reg No</label>
                        <input type="text" name="no" id="no" class="form-control" required >
                    </div>
                    <div class="col-md-3">
                        
                        <label for="level_id"> <input  type="checkbox" value="1" class="no_change" data-id="level_id" > Level</label>
                        <select name="level_id" id="level_id" class="form-control" onchange="selectSection(this);">
                            <script>
                                document.write(getOptions(data.levels));
                            </script>
                        </select>
                    </div>
                    <div class="col-md-3">
                        
                        <label for="section_id"> <input  type="checkbox" value="1" class="no_change" data-id="section_id" > Section</label>
                        <select name="section_id" id="section_id" class="form-control">
                            
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="gender">gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <script>
                                for (let index = 0; index < gender.length; index++) {
                                    const g = gender[index];
                                    document.write("<option value='"+index+"'>"+g+"<option>")
                                }
                            </script>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="iq">IQ</label>
                        <input  type="number" name="iq" id="iq" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="aadhar_no">Aadhar No</label>
                        <input  type="text" name="aadhar_no" id="aadhar_no" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="religion_id"> <input type="checkbox" value="1" class="no_change" > Religion</label>
                        <select name="religion_id" id="religion_id" class="form-control">
                            <script>
                                document.write(getOptions(data.religions));
                            </script>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <script>
                                document.write(getOptions(data.categories));
    
                            </script>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="caste_id">Caste</label>
                        <select name="caste_id" id="caste_id" class="form-control">
                            <script>
                                document.write(getOptions(data.castes));
    
                            </script>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <div class="card-title">
                            <hr>
                            Address
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="country">Country</label>
                        <input list="data-country" type="text" name="country" id="country" class="form-control">
                    </div>
                    
                    
                    <div class="col-md-3">
                        <label for="state">State</label>
                        <input list="data-state" type="text" name="state" id="state" class="form-control">
                    </div>
    
                    <div class="col-md-3">
                        <label for="district">District</label>
                        <input list="data-district" type="text" name="district" id="district" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="tehsil">Tehsil</label>
                        <input list="data-tehsil" type="text" name="tehsil" id="tehsil" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="block">Block</label>
                        <input type="text" name="block" id="block" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="pin">Pin</label>
                        <input list="data-pin" type="text" name="pin" id="pin" class="form-control">
                    </div>
                   
                    <div class="col-md-12">
                        <div class="card-title">
                            <hr>
                            Parent Info
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="father_name">Father's Name</label>
                        <input  type="text" name="father_name" id="father_name" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label for="father_aadhar_no">Father's Aadhar No</label>
                        <input  type="text" name="father_aadhar_no" id="father_aadhar_no" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="father_email">Father's Email</label>
                        <input  type="email" name="father_email" id="father_email" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="father_phone">Father's phone</label>
                        <input  type="text" name="father_phone" id="father_phone" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="father_occupation">Father's Occupation</label>
                        <input  type="text" name="father_occupation" id="father_occupation" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="father_pan">Father's Pan</label>
                        <input  type="text" name="father_pan" id="father_pan" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="father_education">Father's Education</label>
                        <input  type="text" name="father_education" id="father_education" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="mother_name">Mother's Name</label>
                        <input  type="text" name="mother_name" id="mother_name" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label for="mother_aadhar_no">Mother's Aadhar No</label>
                        <input  type="text" name="mother_aadhar_no" id="mother_aadhar_no" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="mother_email">Mother's Email</label>
                        <input  type="email" name="mother_email" id="mother_email" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="mother_phone">Mother's phone</label>
                        <input  type="text" name="mother_phone" id="mother_phone" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="mother_occupation">Mother's Occupation</label>
                        <input  type="text" name="mother_occupation" id="mother_occupation" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="mother_pan">Mother's Pan</label>
                        <input  type="text" name="mother_pan" id="mother_pan" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="mother_education">Mother's Education</label>
                        <input  type="text" name="mother_education" id="mother_education" class="form-control">
                    </div>
                    
                    <div class="col-md-3">
                        <label for="parent_income">Parent's Income</label>
                        <input  type="text" name="parent_income" id="parent_income" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <div class="card-title">
                            <hr>
                            <div class="d-flex justify-content-between">
    
                                <span>
    
                                    Gaurdian Info
                                </span>
                                <span>
                                    <span class="btn btn-sm btn-secondary" onclick="setGaurdian('father');">Same as Father</span>
                                    <span class="btn btn-sm btn-secondary" onclick="setGaurdian('mother');">Same as Mother</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="gaurdian_name">Gaurdian's Name</label>
                        <input  type="text" name="gaurdian_name" id="gaurdian_name" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label for="gaurdian_aadhar_no">Gaurdian's Aadhar No</label>
                        <input  type="text" name="gaurdian_aadhar_no" id="gaurdian_aadhar_no" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="gaurdian_email">Gaurdian's Email</label>
                        <input  type="email" name="gaurdian_email" id="gaurdian_email" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="gaurdian_phone">Gaurdian's phone</label>
                        <input  type="text" name="gaurdian_phone" id="gaurdian_phone" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="gaurdian_occupation">Gaurdian's Occupation</label>
                        <input  type="text" name="gaurdian_occupation" id="gaurdian_occupation" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="gaurdian_relation">Gaurdian's Relation</label>
                        <input  type="text" name="gaurdian_relation" id="gaurdian_relation" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <div class="row ">
                            <div class="col-md-3 ">
                                <div>
                                    <input type="checkbox" value="1" name="bpl" id="bpl" switch data-switch=".bpl"> <strong>Below Poverty Line</strong>
                                </div>
                            </div>
                            <div class="col-md-3 bpl">
                                <label for="bpl_certificate_no">BPL Certificate No</label>
                                <input type="text" class="form-control" name="bpl_certificate_no" id="bpl_certificate_no">
                            </div>
                            <div class="col-md-3 bpl">
                                <label for="bpl_issue_date">BPL Issue Date</label>
                                <input type="date" class="form-control" name="bpl_issue_date" id="bpl_issue_date">
                            </div>
                            <div class="col-md-3 bpl">
                                <label for="bpl_authority">BPL Issued By</label>
                                <input type="text" class="form-control" name="bpl_authority" id="bpl_authority">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card-title">
                            <hr>
                            Physical and Health Condition Info
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="height">Height (CM)</label>
                        <input  type="number" name="height" id="height" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="weight">Weight (KG)</label>
                        <input  type="number" name="weight" id="weight" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <div class="row ">
                            <div class="col-md-3 ">
                                <div>
                                    <input type="checkbox" value="1" name="is_handicap" id="is_handicap" switch data-switch=".is_handicap"> <strong>IS Handicap</strong>
                                </div>
                            </div>
                          
                            <div class="col-md-3 is_handicap">
                                <label for="handicap">Handicap</label>
                                <input type="text" class="form-control" name="handicap" id="handicap">
                            </div>
                            <div class="col-md-3 is_handicap">
                                <label for="handicap_per">Handicap Percentage</label>
                                <input type="text" class="form-control" name="handicap_per" id="handicap_per">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <div class="row ">
                            <div class="col-md-3 ">
                                <div>
                                    <input type="checkbox" value="1" name="is_mentally_chalanged" id="is_mentally_chalanged" switch data-switch=".is_mentally_chalanged"> <strong>IS Mentally Chalanged</strong>
                                </div>
                            </div>
                          
                            <div class="col-md-3 is_mentally_chalanged">
                                <label for="mentally_chalanged">Condition</label>
                                <input type="text" class="form-control" name="mentally_chalanged" id="mentally_chalanged">
                            </div>
                            <div class="col-md-3 is_mentally_chalanged">
                                <label for="mentally_chalanged_per">Handicap Percentage</label>
                                <input type="text" class="form-control" name="mentally_chalanged_per" id="mentally_chalanged_per">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <div class="row ">
                            <div class="col-md-3 ">
                                <div>
                                    <input type="checkbox" value="1" name="has_genetic_disorder" id="has_genetic_disorder" switch data-switch=".has_genetic_disorder"> <strong>Has Genetic Disorder</strong>
                                </div>
                            </div>
                          
                            <div class="col-md-9 has_genetic_disorder">
                                <label for="genetic_disorder">Gentic Disorder</label>
                                <input type="text" class="form-control" name="genetic_disorder" id="genetic_disorder">
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card-title">
                            <hr>
                            Previous School Info
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="prev_school">School Name</label>
                        <input type="text" name="prev_school" id="prev_school" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="prev_school_code">School Code</label>
                        <input type="text" name="prev_school_code" id="prev_school_code" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="prev_school_srn">Prev Student Registration No</label>
                        <input type="text" name="prev_school_srn" id="prev_school_srn" class="form-control">
                    </div>
                    <div class="col-md-9">
                        <label for="prev_school_reason">Leaving Reason</label>
                        <input type="text" name="prev_school_reason" id="prev_school_reason" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="prev_school_leave">Leave Date</label>
                        <input type="date" name="prev_school_leave" id="prev_school_leave" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <div class="card-title">
                            <hr>
                            Extra
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="prev_achivenments">Previous Achivement</label>
                        <textarea name="prev_achivenments" id="prev_achivenments"  rows="4" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="hobbies">Hobbies</label>
                        <textarea name="hobbies" id="hobbies"  rows="4" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12">
                        <div class="card-title">
                            <hr>
                            <div class="d-flex justify-content-between">
                                <span>
                                    Documents
                                </span>
                                <span>
                                    <span class="btn btn-secondary btn-sm" onclick="addDocument()">Add</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row" id="documents">
        
                        </div>
                    </div>
        
                    <div class="col-md-12">
                        <hr>
                        <button class="btn btn-primary">Save Student</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('script')
<script src="{{asset('admin/plugins/drophify/js/dropify.min.js')}}"></script>
<script>
    state=false;
    var did=0;
    $(function () {
        $('#photo').dropify();
        $('#add-student').submit(function (e) {
            e.preventDefault();
            checkEmail(e);
        });
        initSwitch();
        selectSection(1);
    });

    function  addDocument(params) {
            html='<div id="doc-'+did+'" class="col-md-4  mb-3"><div class="shadow p-2"><input type="hidden" name="docs[]" value="'+did+'"/>'+
                '<div><input type="file" accept="image/*" id="doc_image_'+did+'" name="doc_image_'+did+'" reuired/></div>'+
                '<div class="mt-2"><label class="w-100 d-block d-flex justify-content-between align-items-center">'+
                '<span>Document Name</span>'+
                '<span class="btn btn-danger btn-sm" onclick="removeDoc('+did+')"> Remove</span>'+
                '</label><input class="form-control" type="text" id="doc_name_'+did+'" name="doc_name_'+did+'" required /></div>'+
                '</div></div>';
            $('#documents').append(html);
            $("#doc_image_"+did).dropify();
            did+=1;
    }   

    function selectSection(ele){
        $('#section_id').html(getOptions(anotherSelect(data.sections,$('#level_id').val(),1),2));
    }
    function  checkEmail(e) {
        // e.preventDefault();
        if(!state){
            $('#add-student').block();
            axios.post('{{route('admin.email')}}',{'email':$('#email').val()})
            .then((res)=>{
                state=res.data.status<=0;
                // $('#add-student').unblock();
                if(state){
                    // $('#add-student').submit();
                    fd=new FormData(document.getElementById('add-student'));
                    axios.post('{{route('admin.student.add')}}',fd)
                    .then((res)=>{
                        document.getElementById('add-student').reset();
                        $('#add-student').unblock();
                        toastr.success("Student Added Successfully");
                        state=false;

                    })
                    .catch((err)=>{
                        $('#add-student').unblock();
                        toastr.error("Cannot Add Student,"+res.response.data.message);
                        state=false;

                    });
                }else{
                    $('#add-student').unblock();
                    alert('Email Already In Use Please Use Another Email.');
                    state=false;
                }
            });
        }
    }

    
    function setGaurdian(type) {
        ( ['name','aadhar_no','phone','email','occupation']).forEach(element => {
            $('#gaurdian_'+element).val($('#'+type+"_"+element).val());
        });
    }

    function removeDoc(id){
        $('#doc-'+id).remove();
    }
</script>
@endsection