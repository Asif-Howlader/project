@extends("backend.layout.app")
@section("content_area")

          <div align="center" >  <u> <h2>Problem Edit Form</h2></u></div> <br><br><br>
            <form class="form-horizontal" action="{{ url('admin/problem_entry_update') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label col-sm-4" for="name">Name</label>
                    <div class="col-sm-8">          
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="">
                    </div>
                </div>
                <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-8">
                        <input type="hidden" name="problem_edit_id" value="" >
                        <input type="submit" class="btn btn-default" value="Update" name='Submit'>
                    </div>
                </div>
            </form>

    </body>
</html>
@endsection