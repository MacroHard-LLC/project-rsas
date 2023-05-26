<link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
<link rel="stylesheet" href="{{ asset('css/createuser.css') }}">
<link rel="stylesheet" href="{{ asset('css/createsub.css') }}">

@extends('master')

@section('title','Home')
@section('content')

{{-- Modular Pages--}}
@include('subjects.newsub')
@include('levels.newgrlvl')
@include('users.create')
@include('levels.newgrlvl')
@include('misc.newsy')
@include('misc.newinstruct')

@php
    $firstName = auth()->user()->first_name;
@endphp


<div class="vertical-center">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="home-headings text-center mt-3">
                <h1>Welcome, @yield('fullname',$firstName)</h1>
                <h4>What would you like to do today?</h4>
            </div>
        </div>
    </div>


    <div class="container pt-5">
        <div class="row my-3">
            <div class="container">
                <p>rip bozo</p>
            </div>

        </div>
    </div>
</div>

@endsection
