@extends('layouts.admin-layout')


@section('title', 'Prottasha | Admin')


@section('content')

    <h1>Employee List</h1>


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
                                        <th>Employee Name</th>
                                        <th>Type</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Current Address</th>
                                        <th>Join Date</th>
                                        <th>Last Login</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($employees as $employee)

                                        <tr>
                                            <td class="txt-dark">{{$employee->name}}</td>
                                            <td class="txt-dark" style="text-transform:capitalize">{{$employee->type}}</td>
                                            <td class="txt-dark">{{$employee->email}}</td>

                                            <td class="txt-dark">{{$employee->contact_number}}</td>

                                            <td class="txt-dark">{{$employee->current_address}}</td>

                                            <td>{{$employee->created_at}}</td>

                                            <td>{{$employee->last_login}}</td>

                                            <td><a href="#" class="btn btn-primary a-btn-slide-text">
                                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                    <span><strong>Edit</strong></span>
                                                </a></td>

                                            <td><a href="/user/details/{{$employee->id}}" class="btn btn-primary a-btn-slide-text">
                                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                                    <span><strong>View</strong></span>
                                                </a></td>

                                            <td>
                                                <div class="toggle">
                                                        <span class="mid">
                                                            <label class="switch">
                                                                @if($employee->status==1)
                                                                    <input type="checkbox" checked id="feature" onclick="changeStatus({{$employee->id}})">
                                                                @else
                                                                    <input type="checkbox" id="feature" onclick="changeStatus({{$employee->id}})">

                                                                @endif
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </span>
                                                </div>
                                            </td>
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
@section('scripts')
    <script src="{{ URL::asset('assets/js/admin/employeelist.js') }}"></script>

@endsection
