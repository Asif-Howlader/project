@extends("backend.layout.app")
@section("content_area")

<div class="border-top-0" >
<nav class="navbar navbar-inverse"  >
   <h2 align="center" style="color: #f4f6f9"> Student's List</h2>
</nav>
</div><!-- /row -->

<div class="panel-body ">
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Student Email</th>
                <th>Functions</th>
            </tr>
        </thead>
        <tbody>
       
        </tbody> 
        
    </table>
   <h2 align="center">{{ $info }} </h2> 
</div>

@endsection