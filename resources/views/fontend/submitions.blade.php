@extends("fontend.layout.app")
@section("content_area")
<div class="border-top-0" >
<nav class="navbar navbar-inverse"  >
  <div class="container-fluid" >
    <div class="collapse navbar-collapse" id="myNavbar"  >
      <ul class="nav navbar-nav">
        <li ><a href="">Problem</a></li>
        <li class="active"><a href="">Submission</a></li>
      </ul>
    </div>
  </div>
</nav>
<div>
<div> <h1 align="center"><u> Problem Discription </u></h1></div>
<br><br>
<div> <p>  <p></div>
<br><br>


<h3>User posts Example</h3>
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
<strong>user id:{{ $service->user_id }}</strong> <span class="text-muted">code :{{ $service->submited_code }}</span>

<br><p align="right"> DATE:TIME{{ $service->submited_time }} </p>
</div>

@foreach($all_in as $all)
<div class="panel-heading" align="right">
<strong> user name:{{ $all->user_name }} </strong> <p > <span class="text-muted" >code :{{ $all->comment }}</span></p>
</div>
@endforeach



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
   

@endsection