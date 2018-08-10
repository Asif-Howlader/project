@extends("fontend.layout.app")
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
<li> In problems Teacher posted problems for students </li>
<li> Every students must submit there code in text fild thre</li>
<li> One student can submit his or her code at a single time</li>
<li> After submiting code for following problem student can visit discussion/forum </li>
<li> In forum student can comment for every post make by himself or others </li>
<li> Student can comment more then once </li>
 </ul>
</div>
@endsection