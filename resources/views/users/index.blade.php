<link rel="stylesheet" href="{{ asset('css/createuser.css') }}">
    @extends('master')
    @section('content')
    @include('users.create')

<br>
<div class="container-fluid d-flex table-title">
    <h2>USER LIST</h2>
</div>

<div class="container w-100">
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

    <div class="border rounded p-3 align-items-center my-2">
        <table class="table table-striped table-hover" id="userTable" data-toggle="table" data-toolbar="#toolbar">
            <tr>
                <th data-align="right"></th>
                <th>User ID</th>
                <th>Role</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Gender</th>
                <th data-align="left"></th>

            </tr>
            @if(count($users) > 0)
                @foreach ($users as $row)
                <tr>
                    <td><i class="fa-solid fa-circle icon-baby-blue"></td>
                    <td>{{$row['id']}}</td>

                    @if($row['role'] == "0")
                        <td>Administrator</td>
                    @elseif($row['role'] == "1")
                        <td>Student</td>
                    @elseif($row['role'] == "2")
                        <td>Adviser</td>
                    @endif

                    <td>{{$row['last']}}</td>
                    <td>{{$row['first']}}</td>
                    <td>{{$row['middle']}}</td>
                    <td>{{$row['gender']}}</td>
                    <td><a href="/users" class="btn btn-primary" role="button"><i class="fa-regular fa-pen-to-square icon-white"></i></a>&emsp; <a href="/users" class="btn btn-primary" role="button"><i class="fa-solid fa-trash-can icon-white"></i></a></td>

                </tr>
                @endforeach

            @else
				<tr>
					<td colspan="5" class="text-center">No Data Found</td>
				</tr>
			@endif
        </table>
    </div>

    <div>
        {{ $users->links() }}
    </div>

</div>

@endsection
