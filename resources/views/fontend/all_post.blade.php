@extends("fontend.layout.app")
@section("content_area")
<div> <h1 align="center"><u> Problem Discription </u></h1></div>
<br><br>
<div> <p>  <p></div>
<br><br>
<div class="panel-body "> 

		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">		
		  <thead>
            <tr>
                <th>Pop_ID</th>
                <th>user_id</th>
                <th>Submited_code</th>                
                <th>submited_time</th>
            </tr>
        </thead>	
        <tbody>
        @foreach($all_info as $service)
        	  <tr>
               <td>{{ $service->problem_id }}</td>
               <td>{{ $service->user_id }} </td>
                <td>{{ $service->submited_code }} </td> 
                <td>{{ $service->submited_time }} </td>
              </tr>
           
		@endforeach
		
		</tbody>
		</table>{{$all_info ->links()}}
</div>

</div>
</div>
@endsection