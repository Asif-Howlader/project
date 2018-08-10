@extends("fontend.layout.app")
@section("content_area")

<div class="border-top-0" >
<nav class="navbar navbar-inverse"  >
   <h2 align="center" style="color: #f4f6f9"> Problems</h2>
</nav>
</div><!-- /row -->
    
<div class="panel-body ">
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
        <thead>
            <tr>
                <th>Problem Name</th>
                <th>Problem Description</th>
                <th>Functions</th>
            </tr>
        </thead>
        <tbody>
         @foreach($problems_list as $service)
                <td>{{ $service->name }} </td>
                <td width="70%">{{ $service->discription }} </td>
                <td align="center" >
  	<a type="button" href="{{url('/user/problem/'.$service->id)}}" 
  	class="btn btn-success">Try It</a>
 				 </td>
<!--                 {{ url('/delete_data/'.$service->id) }} 
                        onclick="deleteConfirmation({{$service->id}}, 'problems')" -->
            </tr> 
            @endforeach
        </tbody>
        
    </table>{{$problems_list->links()}}
</div>
@endsection