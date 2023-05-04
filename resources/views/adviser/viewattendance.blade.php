<link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
<link rel="stylesheet" href="{{ asset('css/adviserview.css') }}">
<link rel="stylesheet" href="{{ asset('css/createUser.css') }}">


@extends('master')
@section('content')
@section('scripts')

@include('adviser.editattendance')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var adviserID = {{$adviserId}};
        console.log(adviserID);
        $.ajax({
            method: "POST",
            headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: "application/json"
            },
            url: "{{ route('adviser_startup') }}",
            data: { input_data: adviserID },
            success: function(data) {
                console.log(data);
                $('#attendanceAdviserName').text(data);
            }
            });
        const tableBody = document.querySelector('#attendanceTable tbody');
        $.ajax({
            method: "POST",
            headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: "application/json"
            },
            url: "{{ route('get_all_students') }}",
            success: function(data) {
                console.log(data);
                for(var i = 0; i < data.length; i++){
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <td data-student-id="${data[i]['id']}">${data[i]['name']}</td>
                        <td>${data[i]['status']}</td>
                        <td class="delete"><button class="btn btn-primary create btn-create" type="button"><a data-bs-toggle="modal" data-bs-target="#editAttendanceModal"><i class="fa-regular fa-pen-to-square icon-white"></i></a></button></td>
                    `;
                    tableBody.appendChild(newRow);
                    
                }
            }
            });
    });
</script>

@include('adviser.editattendance')

<div class="container mx-10 my-5">
<div class="border rounded px-4 pt-5 pb-3 my-2">
    <div class="row">
        <div class="col col-lg-2">
            <div class="section-title">GRADE LEVEL</div>
            <div class="section-body"><span  id="attendanceGradeLevel" name="attendanceGradeLevel">GRADE 10</span></div>
        </div>

        <div class="col-sm-6">
            <div class="section-title">ADVISER</div>
            <div class="section-body"><span id="attendanceAdviserName" name="attendanceAdviserName">MS. MARY JANE D. PARKER</span></div>
        </div>

        <div class="col col-md-auto">
            <label for="date" class="section-title">DATE</label>
            <br>
            <input class="mt-2"type="date" id="date" placeholder="Choose Date" required>
        </div>
       
        <div class="col col-md-auto">
            <label for="subject" class="section-title">SUBJECT</label>
                <select name="subject" class="form-select w-auto" placeholder="Choose Subject" id="subject" required>
                    <!--ideally mushow unsay mga subjects naa ang section -->
                    <option value="SCI7">GEOLOGY</option>
                    <option value="MATH7">ALGEBRA</option>
                    <option value="ENG7">ENGLISH</option>
                    <option value="AP7">PHILIPPINE HISTORY</option>
                </select>
                <div class="is-invalid" role="alert" id="subjectError" name="subjectError">
                    <strong></strong>
                </div>
        </div>
    </div>


<hr>
    <div class="container table-responsive">

        <div class="row">
            <div class="col">
                <table class="table table-hover table-hover" id="attendanceTable" data-toggle="table" data-toolbar="#toolbar">
                    <thead>
                        <tr>
                            <th class="w-75">Student Name</th>
                            <th data-align="right">Attendance</th>
                            <th data-align="left"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Table rows will be dynamically added here -->
                    </tbody>
                </table>
                
                    <!--<tr>
                        <td class="name">Snow, Jon Stark</td>
                        <td class="attendace" data-align="right" data-status="late">
                            Late
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
                        -
                        </td>
                        <td><a class="btn btn-primary" role="button" onclick="'/hehe'"><i class="fa-regular fa-pen-to-square icon-white"></i></a></td>
                    </tr>
                    <tr>
                        <td class="name">Lannister, Jamie Tyrion</td>
                        <td class="attendance" data-align="right" data-status="absent">Absent</td>
                        <td><a class="btn btn-primary" role="button" onclick="'/hehe'"><i class="fa-regular fa-pen-to-square icon-white"></i></a></td>
                    </tr>
                    <tr>
                        <td class="name">Baratheon, Stannis Robert</td>
                        <td class="attendance" data-align="right" data-status="present">Present</td>
                        <td><button class="btn btn-primary create btn-create" type="button"><a data-bs-toggle="modal" data-bs-target="#editAttendanceModal"><i class="fa-regular fa-pen-to-square icon-white"></i></a></button></td> <!--this is the modal and it shoudl work
                    </tr>-->
                </table>
            </div>
        </div>


    </div>

</div>

</div>



@endsection