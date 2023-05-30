@extends('title')
@section('title','Welcome!')

<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
@section('content')

<div class="container">
<section class="showcase">
    <header>
        <img class="logo" src="{{url('images/macrohard.svg')}}" />
        <span class="logoName">Macrohard ltd.</span>
    </header>
    <div class="text">
      <h2><img class="logo" src="{{url('images/rsas.svg')}}" /></h2> 
      <h3>RFID-Based Student Attendance System</h3>
      <p>Project RSAS proposes the 
        use of an online attendance system with the additional integration of RFID scanning 
        and automated Form 2 generation.</p>
        <div class="login"><a href="/login">Login</a></div>

    </div>
  </section>

  {{-- <div class="shape-blob"></div> --}}
    <div class="shape-blob one"></div>
    <div class="shape-blob two"></div>

</div>
@endsection
