@extends('title')
@section('title','Login')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@section('content')
<div class="container nopadding">
    <div class="left">
      <div class="header">
        <h2 class="animation a1">Welcome back!</h2>
        <h4 class="animation a2">Please enter your credentials</h4>
      </div>
      <form action="{{route('login.post')}}" method="POST">
        @csrf
      <div class="form"> 
        

        <input type="text" class="form-field animation a3" name="id" placeholder="User ID" id="idInput" minlength="9" maxlength="9" pattern="[0-9]+" aria-describedby="useridError">
        @error('id')
        <div class="alert alert-danger animation a5">{{$message}}</div>
        @enderror
        
        <input type="password" class="form-field animation a4" name="password" placeholder="Password" id="passwordInput" aria-describedby="passwordError">
        @error('password')
        <div class="alert alert-danger animation a5">{{$message}}</div>
        @enderror


        @if(session()->has('error'))
        <div class="alert alert-danger animation a5">{{session('error')}}</div>
        @endif

        @if(session()->has('success'))
          <div class="alert alert-success">{{session('success')}}</div>
        @endif
        {{-- <p class="animation a5"><a href="#">Forgot Password</a></p> --}}
        <button type="submit" class="btn btn-primary animation a6">LOGIN</button>
      </div>
      </form>
    </div>
    <div class="right">
      <img class="animation a3" src="/images/title.png">
    </div>
    
  </div>
  @endsection
