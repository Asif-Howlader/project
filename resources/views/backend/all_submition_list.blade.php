@extends("backend.layout.app")
@section("content_area")

<div class="border-top-0" >

<div>
<div> <h2 align="center"><u> Student's posts </u></h2></div>

</div><!-- /col-sm-12 -->
</div><!-- /row -->

@foreach($all_info as $service)
<div class="row">
<div class="col-sm-1"><br>
<div class="thumbnail">
<img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
</div><!-- /thumbnail -->
</div><!-- /col-sm-1 -->


<div class="panel panel-default"><br>
<div class="panel-heading">
<strong>user id:{{ $service->user_id }}</strong> <span class="text-muted">Problem ID :{{ $service->problem_id }}</span>
<br><p><b><u> Code:</u></b> {{ $service->submited_code }}</p>
<br><p align="right"> DATE:TIME{{ $service->submited_time }} </p>
</div>





<div  > <!-- /This is the comment section  -->
<!-- /panel panel-default -->
<form action="{{url('/user/comment')}}" method="post">
{{ csrf_field() }}
<input type="text" class="form-control" id="comment" name="comment" value="" >
<input type="hidden" class="form-control" id="name" name="user_id" value="{{Auth::user()->id}}"> 
<input type="hidden" class="form-control" id="name" name="id" value="{{$service->id}}"> 
<input type="hidden" class="form-control" id="name" name="problem_id" value="{{$service->problem_id}}"> 
<input type="hidden" class="form-control" id="name" name="user_name" value="{{Auth::user()->name}}"> 
</form>
</div><!-- /col-sm-5 -->
</div>
</div>
@endforeach <br>

{{$all_info->links()}}
@endsection