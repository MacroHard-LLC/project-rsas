<link rel="stylesheet" href="{{ asset('css/viewgrlvl.css') }}">
<link rel="stylesheet" href="{{ asset('css/createUser.css') }}">
@extends('master')
@section('title','View Section')
@section('content')
@include('sections.edit')

<div class='container m-2'>
    <div class='row'>
        <div class='col'>
            <a href='/gradelevels' class='text' role='button'><i class="fa-solid fa-arrow-left"></i> BACK</a>
        </div>
    </div>
</div>

<div class='container mx-10 my-5'>
<div class="border rounded px-4 pt-5 pb-3 my-2">
    <div class='row px-3'>
        <div class='col'>
            <div class="section-title">GRADE LEVEL</div>

            <div class="section-body">{{$section->grade_level}} - {{$section->name}}</div>
        </div>
        <div class='col'>
            <div class="section-title">SECTION ID</div>

            <div class="section-body">{{$section->id}}</div>
        </div>


        <div class='col'>
            <div class="section-title">CLASS ADVISER</div>

            <div class="section-body">{{$section->user->first_name}} {{$section->user->last_name}}</div>
        </div>
        <div class='col'>
            <div class="section-title">ADVISER ID</div>

            <div class="section-body">{{$section->user->id}}</div>
        </div>
        <div class="px-2">
        <hr>
        </div>
    </div>



<div class='container table-responsive'>
    <div class='row'>
        <div class='col'>
            <table class='table table-striped table-hover'>
                <thead>
                    <tr>
                        <th scope='col' class="w-10"></th>
                        <th scope='col'>RFID</th>
                        <th scope='col'>Student's Name</th>
                        <th scope='col'>Student's ID</th>
                        <th scope='col'>Enrolment Status</th>
                    </tr>
                </thead>

                <tbody>
                    @if(count($students) > 0)
                        @foreach($students as $student)
                        <tr>
                            <th scope='row' ><i class="fa-solid fa-circle icon-baby-blue"></i></th>
                            <td>{{$student->rfid_number}}</td>
                            <td>{{$student->user->last_name}}, {{$student->user->first_name}} {{$student->user->middle_name}}</td>
                            <td>{{$student->user->id}}</td>
                            <td>{{$student->status}}</td>
                        </tr>
                        @endforeach

                    @else
                        <tr>
                            <td colspan='3' class='text-center'>No Students Found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row px-3">
    <div class="col section-button ">
    <script src="{{ asset('js/sectionIndex.js') }}"></script>
    <a class="btn btn-primary" role="button" onclick="updateModal({{ $section }})"><i class="fa-regular fa-pen-to-square icon-white"></i> EDIT</a>
    <a class="btn btn-primary" role="button"><i class="fa-solid fa-trash-can icon-white"></i> DELETE</a>
    </div>
</div>

</div>
</div>
@endsection
