@extends("fontend.layout.app")
@section("content_area")

      <div class="row" align="center">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 " >

       <br>
       
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">{{ $user->name }}</h3><br>
            </div>
            <div class="panel-body">
              
                <div class="col-md-3 col-lg-3 " align="center"> 
                <img src="/project/public/images/{{$profile->Image}}" class="img-rounded" alt="Cinque Terre" width="100" height="100"> 
                </div>
               
               <div class="row">
                <div class=" col-md-9 col-lg-9 "> 
                
                  <table class="table table-user-information">
                    <tbody>
                    
                      <tr>
                        <td>Department:</td>
                        <td> {{ $profile->Department }} </td>
                      </tr>
 
                      <tr>
                        <td>Date of Birth:</td>
                        <td>{{ $profile->DOFB }} </td>
                      </tr>
                      <tr>
                        <td>Gender:</td>
                        <td>{{ $profile->Gender }} </td>
                      </tr>
                      
                        <tr>
                        <td>Home Address:</td>
                        <td>{{ $profile->Address }} </td>
                      </tr>
                      
                      <tr>
                        <td>Email Address:</td>
                        <td>{{ $user->email }} </td>
                      </tr>
                      
                      <tr>
                        <td>Phone Number:</td>
                        <td><br>{{ $profile->phone }} <br></td>                           
                      </tr>
                    
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
                 <div class="panel-footer">

<a  href="{{ url('/user/profile_edit/'.$user->id)}}"  type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>

                    </div>
                                                    
          </div>
        </div>
      </div>
<!--     </div> -->
@endsection