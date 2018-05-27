@extends("backend.layout.app")
@section("content_area")

    <div class="panel-title" align="center" ><u> <h1>Problems List </h1></u></div> <br><br>
    
<div class="panel-body ">
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
        <thead>
            <tr>
                <th>ID</th>
                <th>Problem Name</th>
                <th>Problem Description</th>
                <th>Functions</th>
            </tr>
        </thead>
        <tbody>
         @foreach($problems_list as $service)
                <td>{{ $service->id }}</td>
                <td>{{ $service->name }} </td>
                <td width="70%">{{ $service->discription }} </td>
                <td align="right" ><a href="{{ url('/problem_edit_form/'.$service->id)}}">Edit</a> | <a href="#" onclick="deleteConfirmation({{$service->id}}, 'problems')">Delete</a></td>
<!--                 {{ url('/delete_data/'.$service->id) }} -->
            </tr> 
            @endforeach
        </tbody>
    </table>
</div>
@endsection