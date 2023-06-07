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
    function beforeAnchorClick(caught_value, caught_date, subject) {
        console.log("PROBLEMATIC");
        console.log(subject);
        $.ajax({
            method: "POST",
            headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: "application/json"
            },
            url: "{{ route('session_student_ID') }}",
            data: { input_data : caught_value},
            success: function(data) {
                console.log('OOF');
                console.log(data);
            }
        });
    }
    function sectionSetUP(value){
        $.ajax({
            method: "POST",
            headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: "application/json"
            },
            url: "{{ route('session_student') }}",
            data: { input_data : value},
            success: function(data) {
                console.log(data);
            }
        });
    }

    function onSubjectChange(value){
        const tableBody = document.querySelector('#attendanceTable tbody');
        console.log("AYIEAH");
        console.log(value);
        $.ajax({
            method: "POST",
            headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: "application/json"
            },
            url: "{{ route('session_student') }}",
            data: { input_data : value},
            success: function(data) {
                console.log(data);
            }
        });
        $.ajax({
            method: "POST",
            headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: "application/json"
            },
            url: "{{ route('get_all_students_in_subject') }}",
            data: { input_data : value},
            success: function(data) {
                data.forEach(student => {
                    console.log(student);
                    const studentId = student.id;
                    const button = document.querySelector(`button[value="${studentId}"]`);
                    const td = button.closest('td');
                    const closestTd = td.previousElementSibling;
                    // Update the value of the closest <td>
                    closestTd.textContent = student.status;
                });
            }
        });
    }

    function forcedSetup(value, formattedDate, tableBody){
        console.log("cat");
        console.log(value);
        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                Accept: "application/json"
            },
            url: "{{ route('get_all_students_adviser') }}",
            data: { input_data: value },
            success: function(data) {
                console.log("shet");
                console.log(data);
                for(var i = 0; i < data.length; i++){
                    const newRow = document.createElement('tr');
                    const array = new Array(data[i]['id'], formattedDate, value);
                    console.log("this is a");
                    console.log(array[2]);
                    newRow.innerHTML = `
                        <td>${data[i]['name']}</td>
                        <td id="studentStatusAttendance" name="studentStatusAttendance">${data[i]['status']}</td>
                        <td class="editStatus">
                            <button id="editStatus" name="editStatus" data-id="${array}" value="${data[i]['id']}" onclick="beforeAnchorClick(${data[i]['id']}, ${array[1]}, ${value})"class="btn btn-primary create btn-create" type="button">
                                <a data-bs-toggle="modal" data-bs-target="#editAttendanceModal">
                                    <i class="fa-regular fa-pen-to-square icon-white"></i>
                                </a>
                            </button>
                            <span data-id="${data[i]['id']}"></span>
                        </td>
                    `;
                    tableBody.appendChild(newRow);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    }

    $(document).ready(function() {
        // Get today's date
        var today = new Date();

        // Format the date as "YYYY-MM-DD"
        var year = today.getFullYear();
        var month = (today.getMonth() + 1).toString().padStart(2, '0');
        var day = today.getDate().toString().padStart(2, '0');
        var formattedDate = `${year}-${month}-${day}`;

        // Set the default value of the date input
        document.getElementById('date').value = formattedDate;
        // Get today's date
        var today = new Date();

        // Format the date as "YYYY-MM-DD"
        var year = today.getFullYear();
        var month = (today.getMonth() + 1).toString().padStart(2, '0');
        var day = today.getDate().toString().padStart(2, '0');
        var formattedDate = `${year}-${month}-${day}`;

        // Set the default value of the date input
        document.getElementById('date').value = formattedDate;


        var adviserID = {{ $adviserId }};
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
        $.ajax({
            method: "POST",
            headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: "application/json"
            },
            url: "{{ route('grade_level_startup') }}",
            data: { input_data: adviserID },
            success: function(data) {
                console.log(data);
                $('#attendanceGradeLevel').text(data);
            }
        });
        const tableBody = document.querySelector('#attendanceTable tbody');
        let subject = $('#subject_adviserView_dropdown');
        console.log("NOT DAIJOUBU");
    
        //subject.append('<option value="A24">meow</option>');
        
        let startSubject = '';
        $.ajax({
            method: "POST",
            headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: "application/json"
            },
            url: "{{ route('setUp_subjects') }}",
            data: { input_data: adviserID },
            success: function(data) {
                console.log(data);
                data.forEach(element => {
                    if (startSubject == ''){
                        startSubject = element.id;
                        console.log(element.id);
                        forcedSetup(startSubject, formattedDate, tableBody);
                    }
                    subject.append(`<option value="${element.id}">${element.name}</option>`);
                });
            }
        });

        console.log("sadje");
        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                Accept: "application/json"
            },
            url: "{{ route('get_all_students_adviser') }}",
            success: function(data) {
                console.log(data);
                for(var i = 0; i < data.length; i++){
                    const newRow = document.createElement('tr');
                    const array = new Array(data[i]['id'], formattedDate, subject);
                    console.log(array);
                    newRow.innerHTML = `
                        <td>${data[i]['name']}</td>
                        <td>${data[i]['status']}</td>
                        <td class="editStatus">
                            <button id="editStatus" name="editStatus" data-id="${array}" class="btn btn-primary create btn-create" type="button">
                                <a data-bs-toggle="modal" data-bs-target="#editAttendanceModal">
                                    <i class="fa-regular fa-pen-to-square icon-white"></i>
                                </a>
                            </button>
                            <span data-id="${data[i]['id']}"></span>
                        </td>
                    `;
                    tableBody.appendChild(newRow);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });

    });

    $(document).on('click', '#editStatus', function() {
        //var element = $(this).siblings('span');
        //var value = element.data('id');
        var element = $(this).closest('td').find('span');
        console.log(element)
        var value = element.data('id');

        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                Accept: "application/json"
            },
            url: "{{ route('add_id_edit_status') }}",
            data: {value},
            success: function(data) {
                console.log(data);
            }
        });
    });


    /*$('#editStatus').on('click',function(){
    var value = $(this).closest('td').attr('data-student-id');
    $.ajax({
        method: "POST",
        headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                Accept: "application/json"
        },
        url: "{{ route('add_id_edit_status') }}",
        data: { input_data : value },
        success: function(data) {
            console.log('BULLSHIT');
        }
    });
});*/

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
                <select name="subject" class="form-select w-auto" onchange="onSubjectChange(this.value)" placeholder="Choose Subject" id="subject_adviserView_dropdown" required>
                    <!--ideally mushow unsay mga subjects naa ang section -->
                </select>
                <div class="is-invalid" role="alert" id="subjectError" name="subjectError">
                    <strong></strong>
                </div>
        </div>
    </div>


<hr>
    <div class="container table-responsive" data-bs-backdrop="static">

        <div class="row">
            <div class="col">
                <table class="table table-hover table-hover" id="attendanceTable" data-toggle="table" data-toolbar="#toolbar">
                    <thead>
                        <tr>
                            <th class="w-75">Student Name</th>
                            <th data-align="right">Attendance</th>
                            <th data-align="left"></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Table rows will be dynamically added here -->
                    </tbody>
                </table>
            </div>
        </div>


    </div>

</div>

</div>



@endsection