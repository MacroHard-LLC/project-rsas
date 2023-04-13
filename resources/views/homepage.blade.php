<link rel="stylesheet" href="{{ asset('css/homepage.css') }}">

@extends('master')
@section('content')

{{-- Modular Pages--}}
@include('users.create')
@include('subjects.newsub')

<div class="container-fluid homepage">
  <center>
  <h1>WELCOME, USER!</h1>
  <h4>What would you like to do today?</h4>
  </center>
</div>

      <div class="container pt-5">
      <fieldset>
        <div class="row my-3 gy-4">
              <div class="container options">
                <div class="row justify-content-center">
                  <div class="col-sm-12">
                    <div class="d-grid gap-4 text-center">
                      <div class="row">
                        <div class="col-md-4">
                          <button class="btn btn-primary create btn-create" type="button" onclick="location.href='/users'">View User</button>
                        </div>
                        <div class="col-md-4">
                          <button class="btn btn-primary create btn-create" type="button" onclick="location.href='http://www.example.com'">View Section</button>
                        </div>
                        <div class="col-md-4">
                          <button class="btn btn-primary create btn-create" type="button" onclick="location.href='http://www.example.com'">View Subject</button>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <button class="btn btn-primary create btn-create" type="button">
                            <a data-bs-toggle="modal" data-bs-target="#registerModal">Create User</a></button>
                          {{--<a class="btn btn-primary" role="button" data-bs-toggle="modal" data-bs-target="#registerModal">Create User</a>--}}
                        </div>
                        <div class="col-md-4">
                          <button class="btn btn-primary create btn-create" type="button" onclick="location.href='http://www.example.com'">Create Section</button>
                        </div>
                        <div class="col-md-4">
                          <button class="btn btn-primary create btn-create" type="button">
                            <a data-bs-toggle="modal" data-bs-target="#registerSubModal">Create Subject</a></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          
        </div>
      </fieldset>
    </div>

@endsection