@extends('title')
@section('title','Login')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@section('content')
<div class="container">
  <div class="mt-5">
     
  </div>


    <div class="left">
      

      
      <div class="header">
        <h2 class="animation a1">Welcome to RSAS</h2>
        <h4 class="animation a2">Enter your credentials</h4>
      </div>
      <form action="{{route('login.post')}}" method="POST">
        @csrf
      <div class="form"> 
        @if($errors->any())
        @foreach($errors->all() as $error)
          <div class="alert alert-danger">{{$error}}</div>
        @endforeach
        @endif

        @if(session()->has('error'))
        <div class="alert alert-danger animation a4">{{session('error')}}</div>
        @endif

        @if(session()->has('success'))
          <div class="alert alert-success animation a4">{{session('success')}}</div>
        @endif

        <input type="number" class="form-field animation a3" name="id" placeholder="User ID" id="idInput" minlength="9" maxlength="9" pattern="[0-9]+" aria-describedby="useridError">
        <input type="password" class="form-field animation a4" name="password" placeholder="Password" id="passwordInput" aria-describedby="passwordError">
        <p class="animation a5"><a href="#">Forgot Password</a></p>
        <button type="submit" class="btn btn-primary animation a6">LOGIN</button>
      </div>
      </form>
    </div>
    <div class="right"><div class="animation a1"><img src="/images/title.png" /></div></div>
    
  </div>
  @endsection