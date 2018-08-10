@extends("backend.layout.app")
@section("content_area")

<div class="border-top-0" >
<nav class="navbar navbar-inverse"  >
   <h2 align="center" style="color: #f4f6f9"> Evaluation</h2>
</nav>
</div><!-- /row -->

<div class="panel-body">
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
        <thead>
            <tr >
                <th width="5%" align="center">Problem ID</th>
                <th width="5%" align="center">Student ID</th>
                <th width="60%" align="center">Submition  </th>
                <th width="5%" align="center">Status  </th>
                <th width="25%" align="center">Options</th>
            </tr>
        </thead>
        @foreach($info as $service)
        <tbody>
                <td>{{ $service->problem_id }}</td>
                <td>{{ $service->user_id }} </td>
                <td>{{ $service->submited_code }} </td>
                <td>@if($service->state == '0' & $service->t_val == '0')
                <a style="color:#f45942"> painding </a>
                @elseif($service->state == '1' & $service->t_val == '0')
                   <a>NOT OK</a> 
                  @elseif($service->state == '1' & $service->t_val == '1')
                  <a> OK</a> 
                   @endif</td>                 
                <td align="left" > 
                <form action="{{ url('/admin/currection') }}" method="post">
                {{ csrf_field() }}
                			  <input type="hidden" name="post_id" value="{{ $service->id }}" >
                              <input type="radio" name="t_val" value="1" > OK <a>  |  </a>
                              <input type="radio" name="t_val" value="0" > NOT <a>  |  </a>                        
                              <input type="submit" style="color:#f44242" class="btn btn-default" value="Update" name='Submit'>
                </form></td>
           
        </tbody>
        @endforeach
    </table>
    {{$info->links()}}
</div>
@endsection