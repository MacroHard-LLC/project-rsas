<link rel="stylesheet" href="{{ asset('css/createUser.css') }}">

@extends('master')
@section('title','View User')
@section('content')

@include('users.create')
@include('users.edit')
@include('users.delete')

<br>
<div class="container-fluid d-flex table-title">
    <h2>USER LIST</h2>
</div>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 justify-content-md-end">
            <a href="/users" class="btn btn-secondary" role="button">ALL</a>
            <a href="/users/?role=student" class="btn btn-secondary" role="button">STUDENT</a>
            <a href="/users/?role=adviser" class="btn btn-secondary" role="button">ADVISER</a>
            <a href="/users/?role=admin" class="btn btn-secondary" role="button">ADMIN</a>
        </div>

        <div class="d-flex col justify-content-md-end">
            <a class="btn btn-primary" role="button" data-bs-toggle="modal" data-bs-target="#registerModal"><i class="fa-solid fa-user-plus"></i> new user</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="border rounded p-3 align-items-center my-2">
                <table class="table table-striped table-hover" id="userTable" data-toggle="table" data-toolbar="#toolbar">
                    <tr>
                        <th data-align="right"></th>
                        <th>User ID</th>
                        <th>Role</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Sex</th>
                        <th data-align="left"></th>
                    </tr>

                    @if(count($users) > 0)
                        <script src="{{ asset('js/usersIndex.js') }}"></script>
                        @foreach ($users as $user)
                        @php
                            $student = NULL;
                        @endphp
                        <tr>
                            <td><i class="fa-solid fa-circle icon-baby-blue"></td>
                            <td>{{$user['id']}}</td>

                            @if($user['role'] == "admin")
                                <td>Administrator</td>
                            @elseif($user['role'] == "student")
                                @php
                                    $student = $user->student
                                @endphp
                                <td>Student</td>
                            @elseif($user['role'] == "adviser")
                                <td>Adviser</td>
                            @endif

                            <td>{{$user['last_name']}}</td>
                            <td>{{$user['first_name']}}</td>
                            <td>{{$user['middle_name']}}</td>
                            <td>{{$user['sex']}}</td>

                            <td>
                                <a class="btn btn-primary" role="button" onclick="updateModal({{$user}},{{$student}})"><i class="fa-regular fa-pen-to-square icon-white"></i></a>
                                <a class="btn btn-primary" role="button" onclick="deleteModal({{$user}})"><i class="fa-solid fa-trash-can icon-white"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center">No Data Found</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>

    <div>
        {{ $users->links() }}
    </div>

</div>

@endsection
