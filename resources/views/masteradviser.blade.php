<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title','RFID-Based School Attendance System')</title>
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  @vite(['resources/js/app.js'])
  <script src="https://kit.fontawesome.com/47cd24d297.js" crossorigin="anonymous"></script>
</head>
<link rel="icon" href="{{ URL::asset('favicon.ico') }}" type="images/x-icon"/>

@php
    $space=" ";
    $firstName = auth()->user()->first_name;
    $fullName = auth()->user()->first_name .= $space .= auth()->user()->last_name;
@endphp

@include('subjects.newsub')
@include('sections.create')
@include('users.create')
@include('misc.newsy')
@include('misc.newinstruct')

<body>

    <!--NAVBAR-->
    {{-- <nav class="navbar navbar-expand-sm navbar-custom navbar-dark">
        <div class="container-fluid">
            <a href="/home" class="navbar-brand"><i class="fa-solid fa-clipboard-user icon-white"></i> RFID Attendance System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="#" title="View Account"><i class="fa-solid fa-user icon-white"> @yield('user',$fullName)</i></a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"></a>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="{{route('logout')}}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
        </div>
    </nav> --}}


    <div class="row flex-nowrap side-title">
      <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark-blue">
          <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                  <span class="fs-5 d-none d-sm-inline side-title"><i class="fa-solid fa-clipboard-user icon-white"></i> RFID ATTENDANCE SYSTEM</span>
              <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                  <li class="nav-item">
                      <a href="/home" class="nav-link align-middle px-0">
                         <span class="ms-1 d-none d-sm-inline">Home</span>
                      </a>
                  </li>
                  <li>
                      <a href="#" class="nav-link px-0 align-middle">
                          <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Customers</span> </a>
                  </li>
              </ul>
              <hr>
              <div class="dropdown pb-4">
                  <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                      <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                      <span class="d-none d-sm-inline mx-1">@yield('user',$fullName)</span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    
                      <li><a class="dropdown-item" href="{{route('logout')}}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                  </ul>
              </div>
          </div>
      </div>
      <div class="col py-3">

          @yield('content')

      </div>
  </div>

    @yield('scripts')
    @yield('create-user-scripts')
    @yield('update-user-scripts')

</body>

</html>
