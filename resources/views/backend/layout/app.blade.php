<!DOCTYPE html>
<html>
    <head>
        <title>PROJECT AP</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="_token" content="{{ csrf_token() }}">
        <!-- Bootstrap -->
        <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- styles -->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">
         <link href="{{ asset('css/w3.css') }}" rel="stylesheet">

    </head>
    <body>
    @can('isAdmin')
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <!-- Logo -->
                        <div class="logo">
<!--                             <img src="../images/diu1.jpg" class="img-rounded" alt="Cinque Terre" width="60" height="50">  -->
                        </div>
                    </div>
                    <div class="col-md-4" align="right">                    
                        <div class="row">
                            <div class="col-lg-12">
                            <form action="{{ url('/admin/search') }}" method="get" >
                    			{{ csrf_field() }}
                                <div class="input-group form">
                                    <input type="text" class="form-control" id="search" name="search" placeholder="Search...">                                    
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">Search</button>   
                                        <span class="glyphicon glyphicon-search"></span>                                     
                                    </span>                                     
                                </div>
                                </form>
                            </div>
                        </div>                        
                    </div>
                    
                    <div class="col-md-3">
                   
                        <div class="navbar navbar-inverse" role="banner">                         
                            <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                            <img src="/project/public/images/{{Auth::user()->Image}}" class="img-rounded" alt="Cinque Terre" style="margin:1px" width="40" height="48">
                                <ul class="nav navbar-nav">                                
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}} <b class="caret"></b></a>
                                        <ul class="dropdown-menu animated fadeInUp">
                                        
                                            <li><a href="{{ url('/admin/profile/'.Auth::user()->id) }}" class="glyphicon glyphicon-eye-open">Profile</a> </li>
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
                    @include("backend.layout.side_menu")
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
                    An education aid system project BSc 2018  <a href="{{url('https://youtu.be/rN7IdoywwJo')}}">  (YouTube URL)</a>
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
        <script src="{{ asset('bootstrap/js/jquery.js') }}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <script src="{{ asset('js/sweetalert.js') }}"></script>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript">
            function deleteConfirmation(delete_id, table_name, field_name=""){
                swal({
                    title: "You want to delete this?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Confirm",
                    closeOnConfirm: false
                  },
                  function(){
                    
                    $.ajax({
                        url         :   "{{ url('/admin/delete_data')}}",
                        type        :   "get",
                        dataType    :   "json",
                        data        :   "delete_id="+delete_id+"&table_name="+table_name+"&field_name="+field_name,
                        success     : function (response){
                            if(response.status=="success"){
                            	//window.location.reload(); //// This is not jQuery but simple plain ol' JS
                            	location.reload();
                                swal.close();
                                $("#row_"+delete_id).remove();
                            }
                        }
                    });
                    
                  });
              }

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
        <script type="text/javascript">
 
$('#search').on('keyup',function(){
 
$value=$(this).val();
 
$.ajax({
 
type : 'get',
 
url : '{{URL::to('search')}}',
 
data:{'search':$value},
 
success:function(data){
 
$('tbody').html(data);
 
}
 
});
 
 
 
})
 
</script>
<script type="text/javascript">
 
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
 
</script>
    </body>
</html>