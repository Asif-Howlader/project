@extends("backend.layout.app")
@section("content_area")
       

            <u><h2 align="center">Problem Entry Form</h2></u><br><br><br>
            <form class="form-horizontal" action="{{ url('problem_insert') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label col-sm-4" for="name">Name</label>
                    <div class="col-sm-8">          
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"> <br> <br>
                        <textarea rows="4" cols="85" name="discription"> </textarea>   
                        
                         <br> <br>
                        <input type="submit" style="color: #41f4d9" class="btn btn-default" value="Submit" name='Submit'>
                  </div>
                </div>
            </form>
     
    </body>
</html>        

@endsection