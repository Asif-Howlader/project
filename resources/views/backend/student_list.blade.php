@extends("backend.layout.app")
@section("content_area")

    <div class="panel-title" align="center" ><u> <h1>Submited Students List </h1></u></div> <br><br>
    
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