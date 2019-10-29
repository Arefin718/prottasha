@csrf
@extends("layouts.user-layout")
@section('title', 'My Login history')


@section('content')

<h4>{{Session::get('user.name')}}</h4>
<div class="links">
    <a href="/{{Session::get('user.type')}}/dashboard">Back to Home</a>
</div>
<h1>Login History</h1>


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
                                    <th>Login Date and Time</th>
                                    <th>Name</th>
                                    <th>Designation</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($logins as $login)

                                    <tr>
                                        <td>{{$login->created_at}}</td>
                                        <td class="txt-dark">
                                            <a href="/user/details/{{$login->user_id}}">{{$login->user_name}}
                                            </a>
                                        </td>
                                        <td class="txt-dark">{{$login->type}}</td>


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
