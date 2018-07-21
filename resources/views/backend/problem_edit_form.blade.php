@extends("backend.layout.app")
@section("content_area")
        
            <u>  <h2 align="center">Problem Edit Form</h2></u><br><br><br>
            <form class="form-horizontal" action="{{ url('/admin/problem_update') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group"> 
                
                    <label class="control-label col-sm-4" for="name">Name</label>
                    <div class="col-sm-8"> 
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ $select_id->name}}"> <br> <br>
                        <textarea rows="4" cols="85" name="discription">{{$select_id->discription}}  </textarea>                     
                         <br> <br>
                         <input type="hidden" name="service_edit_id" value="{{$select_id->id}}" >
                        <input type="submit" style="color: #41f4d9" class="btn btn-default" value="Update" name='Submit'>

                  </div>
                </div>
            </form>
    </body>
</html>
@endsection