@extends('layouts.user-layout')
@section('title', 'Profile')




@section('content')

    <h1>Profile</h1>


  <div class="{{ session()->get('alert')}}">
       <strong>{{ session()->get('type')}}</strong> {{ session()->get('message')}}
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">{{ session()->get('button')}}</span>
       </button>
   </div>

 <div class="container">
      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
           

        <A href="/logout" >Logout</A>
       <br>
<p class=" text-info"> </p>
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">{{$user->name}}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="{{$user->name}} Image" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>

                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                     <tr>
                        <td>Designation:</td>
                        <td>{{$user->type}}</td>
                     </tr>

                     <tr>
                        <td>Join date:</td>
                        <td>{{$user->created_at}}</td>
                     </tr>
                     
                     <tr>
                        <td>Home Address</td>
                        <td>{{$user->parmanent_address}}</td>
                       </tr>
                      <tr>

                        <td>Email</td>
                        <td><a href="mailto:info@support.com">{{$user->email}}</a></td>
                      </tr>

                      <tr>
                        <td>Phone Number</td>
                        <td>{{$user->contact_number}}
                       </tr> 

                      <tr>
                        <td>Last Update</td>
                        <td>{{$user->updated_at}}
                       </tr>           


                    </tbody>
                  </table>
                  
                  <a href="/user/profile/edit" class="btn btn-primary">Edit</a>
                  <a href="/{{Session::get('user.type')}}/dashboard"" class="btn btn-primary">Back to DashBoard</a>
                </div>
              </div>
            </div>
                
          </div>
        </div>
      </div>
    </div>

@endsection
