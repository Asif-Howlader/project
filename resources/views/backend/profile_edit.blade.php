@extends("backend.layout.app")
@section("content_area")

      <div class="row" >
      
      <form enctype="multipart/form-data" class="form-horizontal" action="{{ url('/admin/profile_update') }}" method="post">
      {!! csrf_field() !!}  
              <div class="form-group">
              <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
              </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
         <div class="panel panel-info" >
            <div class="panel-heading">
              <h3 class="panel-title">{{ $user->name }}</h3><br>
            </div>
            <div class="panel-body" >
              
                <div class="col-md-3 col-lg-3 " align="center"> 
                <img src="/project/public/images/{{$profile->Image}}" class="img-rounded" alt="Cinque Terre" width="100" height="100"> 
                <br><br>                      
                                    
                <input type="file" name="pic" required>
                
                </div>
                <div class="row" >
                <div class=" col-md-6 col-lg-9 " > 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Department:</td>
                        <td><input type="text" class="form-control" name="Department"  value="{{ $profile->Department }}"></td>
                      </tr>
                      <tr>
                        <td>Date of Birth:</td>
                        <td><input type="text" class="form-control" name="DOFB"  value="{{ $profile->DOFB }}"></td>
                      </tr>
                   
                      <tr>       
                        <td>Gender:</td>
                        <td><input type="text" class="form-control" name="Gender"  value="{{ $profile->Gender }}"></td>
                      </tr>
                        <tr>
                        <td>Home Address:</td>
                        <td><input type="text" class="form-control" name="Address"  value="{{ $profile->Address }}"></td>
                      </tr>
                      <tr>
                        <td>Email Address:</td>
                        <td>{{ $user->email }}</td>
                      </tr>
                      <tr>
                        <td>Phone Number:</td>
                        <td><input type="text" class="form-control" name="phone" value="{{ $profile->phone }}"><br></td>                                                   
                      </tr>
                     
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                 <input type="hidden" name="profile_edit_id" value="{{$user->id}}" >
                 <input type="submit" class="btn btn-success " value="Update" name='Submit'><i></i></input>
                </form>  </div>
                 </div>
                 </div>
                 </div>
                                                   
          </div>
@endsection