<link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
<link rel="stylesheet" href="{{ asset('css/createuser.css') }}">
<link rel="stylesheet" href="{{ asset('css/createsub.css') }}">

@extends('master')
@section('content')

{{-- Modular Pages--}}
@include('subjects.newsub')
@include('levels.newgrlvl')
@include('users.create')
@include('levels.newgrlvl')



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
                        <button class="btn btn-primary create btn-create" type="button" onclick="location.href='/users'">View User</button>
                        </div>
                        <div class="col-md-4" style="width:300px">
                        <button class="btn btn-primary create btn-create" type="button" onclick="location.href='/gradelevels'">View Section</button>
                        </div>
                        <div class="col-md-4" style="width:300px">
                        <button class="btn btn-primary create btn-create" type="button" onclick="location.href='/subjects'">View Subject</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" style="width:300px">
                        <button class="btn btn-primary create btn-create" type="button">
                            <a data-bs-toggle="modal" data-bs-target="#registerModal">Create User</a></button>
                        </div>
                        <div class="col-md-4" style="width:300px">
                        <button class="btn btn-primary create btn-create" type="button">
                            <a data-bs-toggle="modal" data-bs-target="#registerSectionModal">Create Section</a></button>
                        </div>
                        <div class="col-md-4" style="width:300px">
                        <button class="btn btn-primary create btn-create" type="button">
                            <a data-bs-toggle="modal" data-bs-target="#registerSubModal">Create Subject</a></button>
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
