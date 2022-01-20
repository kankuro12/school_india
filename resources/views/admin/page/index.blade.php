@extends('admin.layout.app')
@section('css')
<link href="{{asset('admin/plugins/DataTables/datatables.min.css')}}" rel="stylesheet">   

@endsection
@section('page-option')
<a class="btn btn-primary" href="{{route('admin.page.add',['type'=>$type])}}">
   Add New {{$pageType[0]}}
</a>
@endsection
@section('s-title')
    <li class="breadcrumb-item">
        {{ $pageType[1] }}
    </li>
    
@endsection
@section('content')

<div class="card shadow">
    <div class="card-body">
        <table id="datatable" class="table">
            <thead>
                <tr>
                    <th>REF ID</th>
                    <th>
                        Title
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $page)
                    <tr>
                        <td>
                            {{$page->id}}
                        </td>
                        <td>
                            {{$page->title}}
                        </td>
                        <td>
                            <a href="{{route('admin.page.edit',['page'=>$page->id])}}" class="btn btn-sm btn-secondary">
                                Edit
                            </a>
                            <a href="{{route('admin.page.del',['page'=>$page->id])}}" class="btn btn-sm btn-danger">
                                del
                            </a>
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
    });
</script>
@endsection
