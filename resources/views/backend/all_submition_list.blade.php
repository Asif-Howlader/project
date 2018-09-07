@extends("backend.layout.app")
@section("content_area")
<div class="border-top-0" >
<nav class="navbar navbar-inverse"  >
   <h2 align="center" style="color: #f4f6f9"> Discussion Board</h2>
</nav>
</div><!-- /row -->

@foreach($user_info as $service)
<div>
<div class="col-sm-1"><br>
<div class="thumbnail">
<img class="img-responsive user-photo" src="/project/public/images/{{$service->Image}}">
</div><!-- /thumbnail -->
</div><!-- /col-sm-1 -->

<div class="panel panel-default">
<div class="panel-heading">
<strong>User Name:{{ $service->name }}</strong> <span class="text-muted">code :{{ $service->submited_code }}</span>

<br><p align="right"> DATE:TIME{{ $service->created_at }} </p>
</div>

@foreach($inn as $all)
@if($all->submition_id == $service->id)
<div class="panel-heading" align="right">
<strong>Name:{{ $all->user_name }} </strong> <p > <span class="text-muted" >code :{{ $all->comment }}</span></p>
</div>
@endif
@endforeach
</div>

 <!-- /This is the comment section  -->
<!-- /panel panel-default -->
<form action="{{url('/user/comment')}}" method="post">
{{ csrf_field() }}
<input type="text" class="form-control" id="comment" name="comment" value="" placeholder="comment here ....">
<input type="hidden" class="form-control" id="name" name="user_id" value="{{Auth::user()->id}}"> 
<input type="hidden" class="form-control" id="name" name="id" value="{{$service->id}}"> 
<input type="hidden" class="form-control" id="name" name="problem_id" value="{{$service->problem_id}}"> 
<input type="hidden" class="form-control" id="name" name="user_name" value="{{Auth::user()->name}}"> 
</form>
</div>
<br>
@endforeach 
   
@endsection