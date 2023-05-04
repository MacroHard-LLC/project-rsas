<link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
<link rel="stylesheet" href="{{ asset('css/adviserview.css') }}">
<link rel="stylesheet" href="{{ asset('css/createUser.css') }}">


@extends('master')
@section('content')

<div class="container mx-10 my-5">
<div class="border rounded px-4 pt-5 pb-3 my-2">
    <div class="row">
        <div class="col col-lg-2">
            <div class="section-title">GRADE LEVEL</div>
            <div class="section-body">GRADE 10</div>
        </div>

        <div class="col col-lg-4">
            <div class="section-title">ADVISER</div>
            <div class="section-body">MS. MARY JANE D. PARKER</div>
        </div>
       
        <div class="col col-lg-4">
            <div class="section-title">SUBJECT</div>
            <div class="section-body">YASSIFICATION</div>
        </div>
    </div>



<hr>

    <div class="container table-responsive">

        <div class="row">
            <div class="col">
                <table class="table table-striped table-hover" id="attendanceTable" data-toggle="table" data-toolbar="#toolbar">
                    <tr>
                        <th class="w-10"></th>
                        <th class="w-75">Student Name</th>
                        <th data-align="center">Status</th>
                        <th data-align="center">Tag</th>
                    </tr>

                    <tr>
                        <td><i class="fa-solid fa-circle icon-baby-blue center"></i></a></td>
                        <td class="name">Snow, Jon Stark</td>
                        <td class="attendace" data-align="center" data-status="Enrolled">
                            Enrolled
                            <!-- edit class attendance portion mayhaps?
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="attendance" id="absentCheck" value="0" required>
                                <label class="form-check-label" for="absentCheck">Absent</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="attendance" id="presentCheck" value="1" required>
                                <label class="form-check-label" for="presentCheck">Present</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="attendance" id="lateCheck" value="2" required>
                                <label class="form-check-label" for="lateCheck">Late</label>
                            </div>
                        -->
                        </td>
                        <td><i class="fa-regular fa-circle"></td>
                    </tr>
                    <tr>
                        <td><i class="fa-solid fa-circle icon-baby-blue center"></i></a></td>
                        <td class="name">Lannister, Jamie Tyrion</td>
                        <td class="attendance" data-align="right" data-status="Dropped">Dropped</td>
                        <td><i class="fa-regular fa-circle"></i></td>
                    </tr>
                    <tr>
                        <td><i class="fa-solid fa-circle icon-baby-blue center"></i></a></td>
                        <td class="name">Baratheon, Stannis Robert</td>
                        <td class="attendance" data-align="right" data-status="Enrolled">Enrolled</td>
                        <td><i class="fa-regular fa-circle"></a></td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

</div>

</div>


@endsection