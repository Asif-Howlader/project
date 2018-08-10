@extends("fontend.layout.app")
@section("content_area")

<div class="border-top-0" >
<nav class="navbar navbar-inverse"  >
   <h2 align="center" style="color: #f4f6f9"> Problem Solution</h2>
</nav>
</div><!-- /row -->

<br>
<div class="panel-body "> 

		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">		
		  <thead>
            <tr>
                <th>user_id</th>
                <th>Submited_code</th>                
                <th>submited_time</th>
            </tr>
        </thead>	
        <tbody>
        @foreach($all_info as $service)
        	  <tr>
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