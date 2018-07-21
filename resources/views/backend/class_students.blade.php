@extends("backend.layout.app")
@section("content_area")

    <div class="panel-title" align="center" ><u> <h1>Student's List </h1></u></div> <br><br>
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
         @foreach($all_info as $service)
                <td>{{ $service->name }} </td>
                <td width="70%">{{ $service->email }} </td>
                <td align="center" >
  	<a type="button" href="{{url('/admin/student_profile/'.$service->id)}}" 
  	class="btn btn-success">Visit</a>
 				 </td>
            </tr> 
            @endforeach
        </tbody>
        
    </table>
</div>

@endsection