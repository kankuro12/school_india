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
    <a href="{{route('admin.exam.index')}}">Exams</a>
</li>
 <li class="breadcrumb-item">
    <a href="{{route('admin.exam.info',['id'=>$exam->id])}}">{{$exam->name}}</a>
</li>
<li class="breadcrumb-item active">
    Setup
</li>
@endsection
@section('content')
    <script>
        _data={!! json_encode($data,true) !!};
        data=getData(_data);
        
    </script>

  
    <div class="card shadow mb-3">
        <div class="card-body">
           <form action="{{route('admin.student.add')}}" id="add-student" method="post" enctype="multipart/form-data"
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        
                        <label for="level_id">  Level</label>
                        <select name="level_id" id="level_id" class="form-control" onchange="selectSection(this);">
                            <script>
                                document.write(getOptions(data.levels));
                            </script>
                        </select>
                    </div>
                    <div class="col-md-6">
                        
                        <label for="section_id"> <input  type="checkbox" value="1" id="use-section"> Section</label>
                        <select name="section_id" id="section_id" class="form-control">
                            
                        </select>
                    </div>
                    <div class="col-md-12 py-2 text-right">
                        <button class="btn btn-primary">Load Subjects</button>
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
    var no_change_data=[];
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
        const section_data=anotherSelect(data.sections,$('#level_id').val(),1);
        document.getElementById('use-section').checked=section_data.length>0;
        $('#section_id').html(getOptions(section_data,2));
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
                        checkDataList();
                        storeNoChange();
                        document.getElementById('add-student').reset();
                        updateNoChange();
                        $('#documents').html('');
                        $('#add-student').unblock();
                        toastr.success("Student Added Successfully");
                        state=false;
                        if($('#no').length>0){
                            $('#no').focus();
                        }else{
                            $('#name').focus();
                        }

                    })
                    .catch((err)=>{
                        $('#add-student').unblock();
                        toastr.error("Cannot Add Student,"+err.response.data.message);
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

    function storeNoChange(params) {
        no_change_data=[];
    
        $('input.no_change').each( function (i  , ele) { 
            if(ele.checked){
                no_change_data[ele.dataset.id]=[$('#'+ele.dataset.id).val(),1];
            }
        });

        $('span.no_change').each( function (i  , ele) { 
            no_change_data[ele.dataset.id]=[$('#'+ele.dataset.id).val(),2];
            
        });
        console.log(no_change_data);
    }

    function updateNoChange(params) {
        for (const key in no_change_data) {
            if (Object.hasOwnProperty.call(no_change_data, key)) {
                const d = no_change_data[key];
                if(d[1]==1){

                    console.log("input[data-id='"+key+"']");
                    $("input[data-id='"+key+"']")[0].checked=true;
                }
                $('#'+key).val(d[0]);

            }
        }
    }
    function checkDataList(){
        $('input[list]').each( function (i  , ele) { 

            const d=ele.value;
            if(d!=""){
                const list= $(ele).attr('list');
                let obj = $('#'+list).find("option[value='" +d + "']");
                    if(!(obj != null && obj.length > 0)){
                        $('#'+list).append('<option value="'+d+'">'+d+'</option>');
                    }
            }
        });
    }

    function removeDoc(id){
        $('#doc-'+id).remove();
    }
</script>
@endsection
