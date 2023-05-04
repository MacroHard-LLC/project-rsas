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
            Class Adviser
            <br>
            {{$section->user->first_name}} {{$section->user->last_name}}
        </div>
        <div class='col'>
            Adviser ID
            <br>
            {{$section->user->id}}
        </div>
    </div>
    <hr>
</div>

<div class='container'>
    <div class='row'>
        <div class='col'>
            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th scope='col'></th>
                        <th scope='col'>Student's Name</th>
                        <th scope='col'>Student's ID</th>
                    </tr>
                </thead>

                <tbody>
                    @if(count($students) > 0)
                        @foreach($students as $student)
                        <tr>
                            <th scope='row'><i class="fa-solid fa-circle icon-baby-blue"></i></th>
                            <td>{{$student->user->last_name}}, {{$student->user->first_name}}</td>
                            <td>{{$student->user->id}}</td>
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

@endsection
