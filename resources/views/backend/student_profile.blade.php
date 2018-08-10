@extends("backend.layout.app")
@section("content_area")

      <div class="row" align="center">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
      </div>
        <div class="col-xs-12 col-sm-12  toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">{{ $user->name }}</h3><br>
            </div>
            <div class="panel-body">
              
                <div class="col-md-3 col-lg-3 " align="center"> 
                <img src="/project/public/images/{{$all_info->Image}}" class="img-rounded" alt="Cinque Terre" width="100" height="100"> 
                </div>
               
               <div class="row">
                <div class=" col-md-9"> 
                
                  <table class="table table-user-information">
                    <tbody>
                    
                      <tr>
                        <td>Department:</td>
                        <td> {{ $all_info->Department }} </td>
                      </tr>
 
                      <tr>
                        <td>Date of Birth:</td>
                        <td>{{ $all_info->DOFB }} </td>
                      </tr>
                      <tr>
                        <td>Gender:</td>
                        <td>{{ $all_info->Gender }} </td>
                      </tr>
                      
                        <tr>
                        <td>Home Address:</td>
                        <td>{{ $all_info->Address }} </td>
                      </tr>
                      
                      <tr>
                        <td>Email Address:</td>
                        <td>{{ $user->email }} </td>
                      </tr>
                      
                      <tr>
                        <td>Phone Number:</td>
                        <td>{{ $all_info->phone }}</td>                           
                      </tr>
                    <tr>
                    
                        <td>Total_submition:</td>
                        <td>{{ $total_submition }}</td>                           
                      </tr>
                      
                      <tr>
                        <td>Total_result_count:</td>
                        <td>{{ $total_result }}</td>                           
                      </tr>
                      <tr>
                        <td style="color:#f44242">Total_painding_result:</td>
                        <td>{{ $total_painding }}</td>                           
                      </tr>
                       <tr>
                        <td>Total_not_ok:</td>
                        <td>{{ $total_not_ok }}</td>                           
                      </tr>                    
                      
                      <tr>
                        <td>Total_ok:</td>
                        <td>{{ $total_ok }}</td>                           
                      </tr>
                     
                      
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
                 <div class="panel-footer"><a> </a>
                    </div>
                                                    
          </div>
        </div>
      </div>
<!--     </div> -->
@endsection