<link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
<link rel="stylesheet" href="{{ asset('css/adviserview.css') }}">
<link rel="stylesheet" href="{{ asset('css/createuser.css') }}">


@extends('master')
@section('content')
@section('scripts')

@include('adviser.tag')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
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
                $('#attendanceGradeLevel').text(data);
            }
        });
        const tableBody = document.querySelector('#attendanceTable tbody');
        let subject = $('#subject_adviserView_dropdown');

        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                Accept: "application/json"
            },
            url: "{{ route('get_all_students_tag') }}",
            success: function(data) {
                for(var i = 0; i < data.length; i++){
                    const newRow = document.createElement('tr');
                    const array = data[i]['id'];
                    newRow.innerHTML = `
                        <td>${data[i]['name']}</td>
                        <td>${data[i]['status']}</td>
                        <td class="editStatus">
                            <button id="tagStudent" name="tagStudent" data-id="${array}" value="${array}" onclick="beforeAnchorClick(this)" class="btn btn-primary create btn-create" type="button">
                                <a data-bs-toggle="modal" data-bs-target="#tagModal">
                                    <i class="fa-solid fa-tag" data-bs-target="#tagModal"></i>
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

    function beforeAnchorClick(button) {
        caught_value = button.getAttribute('data-id');
        $.ajax({
            method: "POST",
            headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: "application/json"
            },
            url: "{{ route('session_student_ID') }}",
            data: { input_data: caught_value },
            success: function(data) {
                console.log("");
            }
        });
    }

    $(document).on('click', '#editStatus', function() {
        var element = $(this).closest('td').find('span');
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
                console.log('');
            }
        });
    });
</script>

<div class="container mx-10 my-5">
<div class="border rounded px-4 pt-5 pb-3 my-2">
    <div class="row">
        <div class="col col-lg-2">
            <div class="section-title">GRADE LEVEL</div>
            <div class="section-body"><span id="attendanceGradeLevel" name="attendanceGradeLevel">GRADE 10</span></div>
        </div>

        <div class="col col-lg-4">
            <div class="section-title">ADVISER</div>
            <div class="section-body"><span id="attendanceAdviserName" name="attendanceAdviserName">MS. MARY JANE D. PARKER</span></div>
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
                            <th data-align="right">Status</th>
                            <th data-align="left">Tag</th>
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
