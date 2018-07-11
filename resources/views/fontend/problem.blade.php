@extends("fontend.layout.app")
@section("content_area")
<div class="border-top-0" >
<nav class="navbar navbar-inverse"  >
  <div class="container-fluid" >
    <div class="collapse navbar-collapse" id="myNavbar"  >
      <ul class="nav navbar-nav">
        <li class="active"><a href="">Problem</a></li>
        <li><a href="{{URL('/user/all_submition/'.$all_info->id)}}">Submission</a></li>
      </ul>
    </div>
  </div>
</nav>
<div>
<div> <h1 align="center"><u> Problem Discription ({{$all_info->name}})</u></h1></div>
<br><br>
<div> <p> {{$all_info->discription}} <p></div>
<br><br>
<div> 
<form action="{{url('/user/submition')}}" method="post">
{{ csrf_field() }}
<textarea rows="7" cols="70" name="code"> </textarea>
<input type="hidden" class="form-control" id="name" name="id" value="{{$all_info->id}}" >
<input type="hidden" class="form-control" id="name" name="user_id" value="{{Auth::user()->id}}"> <br>
<input type="submit" class="btn btn-success"  name="Submit">

</form>
</div>
</div>
</div>
@endsection