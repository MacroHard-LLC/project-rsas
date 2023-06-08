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

{{-- Modular Pages--}}
@include('subjects.newsub')
@include('sections.create')
@include('users.create')
@include('misc.newsy')
@include('misc.newinstruct')

<body>

    <!--NAVBAR-->
    <nav class="navbar navbar-expand-sm navbar-custom navbar-dark">
        <div class="container-fluid">
            <a href="/home" class="navbar-brand side-title"><i class="fa-solid fa-clipboard-user icon-white"></i> RFID Attendance System</a>
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
    </nav>


    <div class="row flex-nowrap">
      <div class="col-auto px-sm-2 px-0 bg-dark-blue">
          <div class="d-flex flex-column align-items-center align-items-sm-start mx-4 text-white min-vh-100">
              <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                  <li class="nav-item">
                      <a href="/home" class="nav-link align-middle px-0">
                         <span class="ms-1 d-none d-sm-inlin side-options">Home</span>
                      </a>
                  </li>
                  <li>
                      <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-user"></i> <span class="ms-1 d-none d-sm-inline side-options">User</span> </a>
                      <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                          <li class="w-100">
                            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#registerModal">
                             <span class="d-none d-sm-inline side-suboptions">Create User</span> </a>
                          </li>
                          <li>
                            <a href="/users" class="nav-link align-middle">
                              <span class="d-none d-sm-inline side-suboptions">View Users</span> </a>
                          </li>
                      </ul>
                  </li>
                  <li>
                    <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                      <i class="fa-solid fa-users-rectangle"></i> <span class="ms-1 d-none d-sm-inline side-options">Section</span> </a>
                    <ul class="collapse show nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                        <li class="w-100">
                          <a class="nav-link" data-bs-toggle="modal" data-bs-target="#createSectionModal">
                           <span class="d-none d-sm-inline side-suboptions">Create Section</span> </a>
                        </li>
                        <li>
                          <a href="/gradelevels" class="nav-link align-middle">
                            <span class="d-none d-sm-inline side-suboptions">View Sections</span> </a>
                        </li>
                    </ul>
                </li>
                  <li>
                      <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-book"></i> <span class="ms-1 d-none d-sm-inline side-options">Subject</span> </a>
                          <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                          <li class="w-100">
                            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#registerSubModal"> <span class="d-none d-sm-inline side-suboptions">Create Subject</span> </a>
                          </li>
                          <li>
                            <a href="/subjects" class="nav-link align-middle"><span class="d-none d-sm-inline side-suboptions">View Subjects</span> </a>
                          </li>
               
                      </ul>
                  </li>

                  <li>
                    <a href="#submenu4" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                      <i class="fa-solid fa-list"></i> <span class="ms-1 d-none d-sm-inline side-options">Others</span> </a>
                        <ul class="collapse nav flex-column ms-1" id="submenu4" data-bs-parent="#menu">
                        <li class="w-100">
                          <a class="nav-link" data-bs-toggle="modal" data-bs-target="#schoolyearModal"> <span class="d-none d-sm-inline side-suboptions">New School Year</span> </a>
                        </li>
                        <li>
                          <a class="nav-link" data-bs-toggle="modal" data-bs-target="#instructorModal"><span class="d-none d-sm-inline side-suboptions">Create Instructor</span> </a>
                        </li>
                        <li>
                          <a class="nav-link" data-bs-toggle="modal" data-bs-target="#insertmodalpa"><span class="d-none d-sm-inline side-suboptions">Add Machine</span> </a>
                        </li>
             
                    </ul>
                </li>
              </ul>
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
