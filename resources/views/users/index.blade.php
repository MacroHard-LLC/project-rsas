<link rel="stylesheet" href="{{ asset('css/createuser.css') }}">

<x-layout>

    @extends('master')
    @section('content')
    @include('users.create')
    @yield('scripts')
    
<br>
<div class="card">
    <div class="card-header">
		<div class="row justify-content-end">
			<div class="col col-md-6"><h3>User List</h3></div>
			<div class="col col-md-6">
				<a class="btn btn-primary" role="button" data-bs-toggle="modal" data-bs-target="#registerModal">Create User</a>
			</div>
		</div>
	</div>

    <div class="card-body table-responsive-sm">
        <table class="table table-striped table-hover text-nowrap">
            <tr>
                <th></th>
                <th>User ID</th>
                <th>Role</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Gender</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @if(count($users) > 0)
                @foreach ($users as $row)
                <tr>
                    <td><i class="fa-solid fa-circle icon-blue"></td>
                    <td>{{$row['id']}}</td>
                    <td>{{$row['role']}}</td>
                    <td>{{$row['last']}}</td>
                    <td>{{$row['first']}}</td>
                    <td>{{$row['middle']}}</td>
                    <td>{{$row['gender']}}</td>
                    <td></td>
                    <td></td>
                </tr>
                @endforeach
            
            @else
				<tr>
					<td colspan="5" class="text-center">No Data Found</td>
				</tr>
			@endif
        </table>

    </div>


</div>

@endsection
</x-layout>
