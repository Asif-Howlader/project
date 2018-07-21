@extends("fontend.layout.app")
@section("content_area")

    <div class="panel-title" align="center" ><u> <h1>Problems List </h1></u></div> <br><br>
    
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