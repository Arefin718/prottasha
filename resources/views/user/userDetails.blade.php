
@extends('layouts.admin-layout')
@section('title', 'Prottasha | Admin')




@section('content')

    <h1>User Details</h1>


   <div class="{{ session()->get('alert')}}">
       <strong>{{ session()->get('type')}}</strong> {{ session()->get('message')}}
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">{{ session()->get('button')}}</span>
       </button>
   </div>

 <div class="container">
      <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >

   @foreach($users as $user)
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">{{$user->name}}</h3>
            </div>
            <div class="panel-body">
              <div class="row">

                <div class=" col-md-9 col-lg-9 ">
                  <table class="table table-user-information">
                    <tbody>

                      <tr>
                        <td>Join date:</td>
                        <td>{{$user->created_at}}</td>
                      </tr>

                      <tr>
                        <td>Gender</td>
                        <td></td>
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
                        <td>{{$user->contact_number}} </td>
                      </tr>



                      <tr>
                        <td>Added By</td>
                          <td><a href="/user/details/{{$user->added_id}}">{{$user->added_name}}</a>
                        </td>
                      </tr>

                    </tbody>
                  </table>
                  @if($user->type !="Admin")
                  <a href="#" class="btn btn-primary">Performance</a>

                  @endif
                </div>
              </div>
            </div>

             @endforeach
          </div>
        </div>
      </div>
    </div>

@endsection




