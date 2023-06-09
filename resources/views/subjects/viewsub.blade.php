<link rel="stylesheet" href="{{ asset('css/createsub.css') }}">
    @extends('master')
    @section('title','View Subjects')
    @section('content')

    @include('subjects.create')
    @include('subjects.edit')
    @include('subjects.delete')

<br>
<div class="container-fluid d-flex table-title">
    <h2>SUBJECT LIST</h2>
</div>

<div class="container w-100">
    <div class="row">
        <div class="dropdown col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 justify-content-md-end">
            <button class="btn-secondary btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Grade Level
              </button>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/subjects">All Levels</a></li>
                    @for ($i = 7; $i < 11; $i++)
                        <li><a class="dropdown-item" href="/subjects/?grlvl={{$i}}">Grade {{$i}}</a></li>
                    @endfor
                </ul>

        </div>

        <div class="d-flex col justify-content-md-end">
            <a class="btn btn-primary" role="button" data-bs-toggle="modal" data-bs-target="#createSubjectModal"><i class="fa-solid fa-book"></i> new subject</a>
        </div>
    </div>

    <div class="border rounded p-3 align-items-center my-2">
        <table class="table table-striped table-hover" id="userTable" data-toggle="table" data-toolbar="#toolbar">
            <tr>
                <th data-align="right"></th>
                <th>Subject ID</th>
                <th>Subject Name</th>
                <th>Grade Level</th>
                <th>Instructor ID</th>
                <th>Year Start</th>
                <th>Year End</th>
                <th data-align="left"></th>
            </tr>

            @unless(count($subjects) == 0)
            <script src="{{ asset('js/subjectIndex.js') }}"></script>
            @foreach($subjects as $subject)
            <tr>
                <td><i class="fa-solid fa-circle icon-baby-blue"></td>
                <td>{{$subject->id}}</td>
                <td>{{$subject->name}}</td>
                <td>{{$subject->grade_level ?? 'N/A'}}</td>
                <td>{{$subject->instructor->rfid_number}}</td>
                <?php
                    $schoolYear = $subject->schoolyear;
                    // Check if the schoolYear relationship exists
                    if ($schoolYear) {
                        $year_start = $schoolYear->start_year;
                        $year_end = $schoolYear->end_year;
                    } else {
                        $year_start = 'N/A';
                        $year_end = 'N/A';
                    }
                ?>
                <td>{{$year_start}}</td>
                <td>{{$year_end}}</td>
                <td>
                    <a class="btn btn-primary" role="button" onclick="updateModal({{ $subject }}, {{ $subject->schedule }})"><i class="fa-regular fa-pen-to-square icon-white"></i></a>
                    <a class="btn btn-primary" role="button" onclick="deleteModal({{$subject}})"><i class="fa-solid fa-trash-can icon-white"></i></a>
                </td>
            </tr>
            @endforeach

            @else
            <tr>
                <td colspan="5" class="text-center">No Data Found</td>
            </tr>
            @endunless

        </table>
    </div>

    <div>
        {{ $subjects->links() }}
    </div>

</div>

@endsection
