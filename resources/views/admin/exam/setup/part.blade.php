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