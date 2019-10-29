@extends('layouts.member-layout')


@section('title', 'Prottasha | Member')

<link rel="stylesheet" href="{{ URL::asset('assets/css/normalize.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/form-styles.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/datepicker.css') }}">

@section('content')

    <div class="md-form active-cyan-3 mb-4">
        <form class="form-inline md-form form-sm active-cyan-2">
            <input id="search_member" onkeyup="search()" class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search Member" aria-label="Search">
            <i class="fa fa-search" aria-hidden="true"></i>
            <div  style="width: 50%;">

                <ul id="show_member" class="show_member ">

                </ul>

            </div>
        </form>
    </div>

    <br>
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
                                        <th>Member ID</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Current Address</th>
                                        <th>Join Date</th>
                                        <th>Book Issue Date</th>
                                        <th>Registration Fee</th>

                                    </tr>
                                    </thead>
                                    <tbody id="members">

                                    @foreach($members as $member)

                                        <tr>
                                            <td class="txt-dark">{{$member->member_id}}</td>
                                            <td class="txt-dark">{{$member->name}}</td>
                                            <td class="txt-dark">{{$member->contact_number}}</td>
                                            <td class="txt-dark">{{$member->current_address}}</td>
                                            <td class="txt-dark">{{$member->registration_date}}</td>
                                            <td class="txt-dark">{{$member->bookissue_date}}</td>
                                            <td class="txt-dark">{{$member->registration_fee}}</td>


                                            <td><a href="/member/deposit/history/{{$member->id}}">Details</a></td>
                                            <td><a href="/member/edit/{{$member->id}}">Edit</a></td>
                                            <td>
                                                <div class="toggle">
                                                        <span class="mid">
                                                            <label class="switch">
                                                                @if($member->status==1)
                                                                    <input type="checkbox" checked id="feature" onclick="changeStatus({{$member->id}})">
                                                                @else
                                                                    <input type="checkbox" id="feature" onclick="changeStatus({{$member->id}})">

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
    <script src="{{ URL::asset('assets/js/member/memberlist.js') }}"></script>

@endsection
