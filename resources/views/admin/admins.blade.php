@extends('layouts.admin-layout')


@section('title', 'Prottasha | Admin')


@section('content')

    <h1>Admin List</h1>


   <div class="{{ session()->get('alert')}}">
       <strong>{{ session()->get('type')}}</strong> {{ session()->get('message')}}
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">{{ session()->get('button')}}</span>
       </button>
   </div>

<div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body row">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <table class="table display responsive product-overview mb-30" id="myTable">
                                            <thead>
                                            <tr>
                                                <th>Admin Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Current Address</th>
                                                <th>Join Date</th>
                                                <th>Last Login</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($admins as $admin)

                                            <tr>
                                                <td class="txt-dark">{{$admin->name}}</td>
                                                <td class="txt-dark">{{$admin->email}}</td>
                                                <td class="txt-dark">{{$admin->contact_number}}</td>
                                                <td class="txt-dark">{{$admin->current_address}}</td>
                                                <td>{{$admin->created_at}}</td>
                                                <td>{{$admin->last_login}}</td>
                                                <td><a href="#">Details</a></td>
                                            </tr>

                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection