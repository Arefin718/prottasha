@extends('layouts.manager-layout')


@section('title', 'Prottasha | Manager')


@section('content')

    <h1>Dashboard</h1>


   <div class="{{ session()->get('alert')}}">
       <strong>{{ session()->get('type')}}</strong> {{ session()->get('message')}}
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">{{ session()->get('button')}}</span>
       </button>
   </div>



@endsection