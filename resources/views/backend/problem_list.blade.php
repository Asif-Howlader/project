@extends("backend.layout.app")
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
                <th width="5%">ID</th>
                <th width="20%">Problem Name</th>
                <th width="60%">Problem Description</th>
                <th>Functions</th>
            </tr>
        </thead>
        @foreach($problems_list as $service)
        <tbody>
         
                <td>{{ $service->id }}</td>
                <td width="20%">{{ $service->name }} </td>
                <td width="60%">{{ $service->discription }} </td>
                <td align="center" ><a href="{{ url('/admin/problem_edit_form/'.$service->id)}}">Edit</a> | <a href="#" onclick="deleteConfirmation({{$service->id}}, 'problems')">Delete</a></td>
<!--                 {{ url('/delete_data/'.$service->id) }} -->
            
           
        </tbody> 
        @endforeach
    </table>
    {{$problems_list->links()}}
</div>
@endsection