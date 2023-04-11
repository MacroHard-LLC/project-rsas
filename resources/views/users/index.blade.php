<link rel="stylesheet" href="{{ asset('css/createuser.css') }}">

<x-layout>

    @extends('master')
    @section('content')
    @include('users.create')
    @yield('scripts')
    
<br>
<div class="container-fluid d-flex table-title">
        <h2>USER LIST</h2> 
</div>

<div class="d-flex justify-content-md-end create">
    <a class="btn btn-primary" role="button" data-bs-toggle="modal" data-bs-target="#registerModal">Create User</a>
</div>

<div class="card">
        <table class="table table-striped table-hover">
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
                    <td>{{$row['role']}}</td>
                    <td>{{$row['last']}}</td>
                    <td>{{$row['first']}}</td>
                    <td>{{$row['middle']}}</td>
                    <td>{{$row['gender']}}</td>
                    <td><i class="fa-regular fa-pen-to-square icon-dark-blue"></i>&emsp;<i class="fa-solid fa-trash-can icon-dark-blue"></i></td>

                </tr>
                @endforeach
            
            @else
				<tr>
					<td colspan="5" class="text-center">No Data Found</td>
				</tr>
			@endif
        </table>

</div>

@endsection
</x-layout>
