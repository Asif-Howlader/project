@extends("backend.layout.app")
@section("content_area")

  <div class="w3-content w3-display-container">
  <img class="mySlides" src="{{url('./images/BLOG.jpg')}}" style="width:100%"  style="max-height: 300px">
  <img class="mySlides" src="{{url('./images/educatie.jpg')}}" style="width:100%" style="max-height: 300px">
  <img class="mySlides" src="{{url('./images/mx.jpg')}}" style="width:100%" style="max-height: 300px">
  <img class="mySlides" src="{{url('./images/online.jpg')}}" style="width:100%" style="max-height: 300px">
  <img class="mySlides" src="{{url('./images/Online-education.jpg')}}" style="width:100%" style="max-height: 300px">
  <img class="mySlides" src="{{url('./images/online-training.jpg')}}" style="width:100%" style="max-height: 300px">

  <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
</div>
<br>
<div>
<ul>
<li> In Problem Posting section teacher can post problems </li>
<li> In Problems section teacher can update or delete any problem on list</li>
<li> In Evaluation section teacher can judge submited code by students </li>
<li> In Discussion board teacher can comment on any post by student </li>
<li> In Students teacher can find all students on class and check ther profile </li>
<li> ETC section is for future </li>
 </ul>
</div>

@endsection