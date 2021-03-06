
<!DOCTYPE html>
<html>
    <head>
        <title>PROJECT AP</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- styles -->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">
        <link href="{{ asset('css/w3.css') }}" rel="stylesheet">

    </head>
    <body>
    @can('isUser')
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <!-- Logo -->
                    </div>
                    <div class="col-md-3" align="right">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">Search</button>                                        
                                    </span>                                     
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="col-md-4">
                   
                        <div class="navbar navbar-inverse" role="banner">                         
                            <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                            <img src="/project/public/images/{{Auth::user()->Image}}" class="img-rounded" alt="Cinque Terre" style="margin:1px" width="40" height="48">
                                <ul class="nav navbar-nav">                                
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}} <b class="caret"></b></a>
                                        <ul class="dropdown-menu animated fadeInUp">
                                        
                                            <li><a href="{{ url('/user/profile/'.Auth::user()->id) }}" class="glyphicon glyphicon-eye-open">Profile</a> </li>
                                            <li><a href="{{ route('logout') }} " onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     {{ __('Logout') }}
                                                     </a>
                                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        		@csrf
                                    		</form>
                                             </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content">
            <div class="row">
                <div class="col-md-3">
                
                    @include("fontend.layout.side_menu")
                </div>
                <div class="col-md-8">
                    <div class="content-box-large">
                        @yield('content_area')
                        
                    </div>
                </div>
            </div>
        </div> <br>

	<footer>
		<div class="container">

			<div class="copy text-center">
				An education aid system project BSc 2018 <a
					href="{{url('https://youtu.be/rN7IdoywwJo')}}">
					(YouTube URL) </a>
			</div>

		</div>
		@else
		<!-- The Current User Can't Update The Post -->
		<div class="flex-center position-ref full-height">
			<div class="content">
				<div class="title">Sorry, the page you are looking for could not be
					found.</div>
			</div>
		</div>
		@endcan
	</footer>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{ asset('js/jquery.js') }}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <script src="{{ asset('js/sweetalert.js') }}"></script>
        <script type="text/javascript">


            //for slider
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
        </script>        

    </body>
</html>
