@extends('admin.layout.app')
@section('css-include')
    <link rel="stylesheet" href="{{asset('admin/plugins/DataTables/datatables.min.css')}}">
@endsection
@section('page-option')
    <a href="{{route('admin.student.add')}}" class="btn btn-primary">Add Student</a>
@endsection
@section('s-title')
    <li class="breadcrumb-item active">Students</li>
    <li class="breadcrumb-item active">Assements</li>
@endsection
@section('content')
<script>
    _data={!! json_encode($data,true) !!};
    data=getData(_data);
</script>
<div class="card shadow mb-3">
    <div class="card-body">
        <form action="{{route('admin.assessment.add')}}" method="post" id="add-assessment">
            @csrf
            <div class="row">
                <div class="col-md-5">
                    <label for="academic_year_id">Academic Year</label>
                    <select class="form-control" name="academic_year_id" id="academic_year_id">
                        <script>
                            document.write(getOptions(data.academic_years));
                        </script>
                    </select>
                </div>
                <div class="col-md-7">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="col-md-3 d-flex align-items-end py-1">
                    <button class="btn btn-primary" >Save Assesment</button>
                </div>
            </div>
        </form>
      
       
    </div>
</div>

<div class="card shadow">
    <div class="card-body">
        <table id="datatable" class="table">
            <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Academic Year
                    </th>
                    <th>
                        Assessment Title
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assessments as $assessment)
                    <tr id="assessment-{{$assessment->id}}">
                        <td>
                            {{$assessment->id}}
                        </td>
                        <td>
                            {{$assessment->title}}
                        </td>
                        <td>
                            {{$assessment->name}}
                        </td>
                        <td>
                            <a href='{{route('admin.assessment.manage')}}?id={{$assessment->id}}'>Manage<a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('script')
    <script src="{{asset('admin/plugins/DataTables/datatables.min.js')}}"></script>
    <script>
        var table;
        $(function () {
            table=$('#datatable').DataTable({
                "columnDefs": [
                    { "sortable":false,"searchable": false, "targets": 2 }
                ]
            });

            $('#add-assessment').submit(function (e) { 
                e.preventDefault();
                add(this);
            });
        });

        function add(ele) {
            let fd=new FormData(ele);
            axios.post($(ele).attr('action'),fd)
            .then((res)=>{
                ele.reset();
                const ay=(data.academic_years.filter(o=>o[0]==res.data.academic_year_id))[0][1];
                console.log(ay);
                table.row.add(
                [
                    res.data.id,
                    ay,
                    res.data.name,
                    "<a href='{{route('admin.assessment.manage')}}?id="+res.data.id+"'>Manage<a>"
                ]
                ).draw();
            })
            .catch((err)=>{
                console.log(err);
            });
            // table.row.add( [
            //     'adfasdf','ll','<a href="asdfas">kk</a>'
            // ]).draw();
        }
    </script>
@endsection
