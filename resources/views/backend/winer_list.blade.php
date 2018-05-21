@extends("backend.layout.app")
@section("content_area")

 <u><div class="panel-heading" align="center" >
  <h1>  Winer List </h1>
</div></u> <br><br>
<div class="panel-body">
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
        <thead>
            <tr>
                <th>#</th>
                <th>Student Name</th>
                <th>Problem Name</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
                <td>#</td>
                <td> </td>
                <td><a href="">Edit</a> | <a href="#" onclick="">Delete</a></td>
                <td> </td>
            </tr> 
        </tbody>
    </table>
</div>
@endsection