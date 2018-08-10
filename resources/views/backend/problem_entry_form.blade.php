@extends("backend.layout.app")
@section("content_area")
       
<div class="border-top-0" >
<nav class="navbar navbar-inverse"  >
   <h2 align="center" style="color: #f4f6f9">Problem Posting</h2>
</nav>
</div><!-- /row -->
            <form class="form-horizontal" action="{{ url('/admin/problem_insert') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label col-sm-4" for="name">Name</label>
                    <div class="col-sm-8">          
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"> <br> <br>
                        <textarea name="discription" class="form-control"> </textarea>   
                        
                         <br> <br>
                        <input type="submit" style="color: #41f4d9" class="btn btn-default" value="Submit" name='Submit'>
                  </div>
                </div>
            </form>
     
    </body>
</html>        

@endsection