<link rel="stylesheet" href="{{ asset('css/createsub.css') }}">
    @extends('master')
    @section('content')
    @include('subjects.newsub')

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
              {{-- <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Araling Panlipunan</a></li>
                <li><a class="dropdown-item" href="#">English</a></li>
                <li><a class="dropdown-item" href="#">Filipino</a></li>
                <li><a class="dropdown-item" href="#">Mathematics</a></li>
                <li><a class="dropdown-item" href="#">MAPEH</a></li>
                <li><a class="dropdown-item" href="#">Science</a></li>
                <li><a class="dropdown-item" href="#">TLE</a></li>
                <li><a class="dropdown-item" href="#">Values Education</a></li>
              </ul> --}}

                <ul class="dropdown-menu">
                    @for ($i = 1; $i < 11; $i++)
                        <li><a class="dropdown-item" href="/subjects/?grlvl={{$i}}">Grade {{$i}}</a></li>
                    @endfor
                </ul>

        </div>

        <div class="d-flex col justify-content-md-end">
            <a class="btn btn-primary" role="button" data-bs-toggle="modal" data-bs-target="#registerSubModal"><i class="fa-solid fa-book"></i> new subject</a>
        </div>
    </div>

    <div class="border rounded p-3 align-items-center my-2">
        <table class="table table-striped table-hover" id="userTable" data-toggle="table" data-toolbar="#toolbar">
            <tr>
                <th data-align="right"></th>
                <th>Subject ID</th>
                <th>Subject Name</th>
                <th>Instructor ID</th>
                <th>Room</th>
                <th>Year Start</th>
                <th>Year End</th>
                <th data-align="left"></th>
            </tr>

            @unless(count($subjects) == 0)
            @foreach($subjects as $subject)
            <tr>
                <td><i class="fa-solid fa-circle icon-baby-blue"></td>
                <td>{{$subject->id}}</td>
                <td>{{$subject->name}}</td>
                <td>#####</td>
                <td>{{$subject->room}}</td>
                <?php
                    $year_start = date('Y',strtotime($subject->year_start));
                    $year_end = date('Y',strtotime($subject->year_end))
                ?>
                <td>{{$year_start}}</td>
                <td>{{$year_end}}</td>
                <td>
                    <a class="btn btn-primary" role="button" href="#"><i class="fa-regular fa-pen-to-square icon-white"></i></a>
                    <a class="btn btn-primary" role="button" href="#"><i class="fa-solid fa-trash-can icon-white"></i></a>
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
