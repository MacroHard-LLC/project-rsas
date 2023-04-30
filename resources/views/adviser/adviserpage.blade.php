<link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
<link rel="stylesheet" href="{{ asset('css/createuser.css') }}">
<link rel="stylesheet" href="{{ asset('css/createsub.css') }}">

@extends('master')
@section('content')

{{-- Modular Pages--}}
@include('subjects.newsub')
@include('users.create')

<div class="vertical-center">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="home-headings text-center mt-5">
                <h1>Welcome, User!</h1>
                <h4>What would you like to do today?</h4>
            </div>
        </div>
    </div>


    <div class="container pt-5">
        <div class="row my-3 gy-4">
            <div class="container options">
                <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="d-grid gap-5 text-center">
                    <div class="row">
                        <div class="col-md-4" style="width:300px">
                        <button class="btn btn-primary create btn-create" type="button" onclick="location.href='http://www.example.com'">View Attendance</button>
                        </div>
                        <div class="col-md-4" style="width:300px">
                        <button class="btn btn-primary create btn-create" type="button" onclick="location.href='http://www.example.com'">View Students</button>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
