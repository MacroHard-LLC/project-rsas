@extends('master')

@section('content')

<div class='container'>
    <div class='row'>
        <div class='col'>
            Grade Level and Section
            <br>
            {{$section->grade_level}} - {{$section->name}}
        </div>
        <div class='col'>
            Section ID
            <br>
            {{$section->id}}
        </div>
    </div>

    <div class='row'>
        <div class='col'>

        </div>
        <div class='col'>

        </div>
    </div>

</div>

@endsection
