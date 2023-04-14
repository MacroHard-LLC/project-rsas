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
                department
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Araling Panlipunan</a></li>
                <li><a class="dropdown-item" href="#">English</a></li>
                <li><a class="dropdown-item" href="#">Filipino</a></li>
                <li><a class="dropdown-item" href="#">Mathematics</a></li>
                <li><a class="dropdown-item" href="#">MAPEH</a></li>
                <li><a class="dropdown-item" href="#">Science</a></li>
                <li><a class="dropdown-item" href="#">TLE</a></li>
                <li><a class="dropdown-item" href="#">Values Education</a></li>
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

            <tr>
                <td><i class="fa-solid fa-circle icon-baby-blue"></td>
                <td>#####</td>
                <td>Lorem Ipsum</td>
                <td>*****</td>
                <td>AS Hall</td>
                <td>2058</td>
                <td>2068</td>
                <td><a href="/subject" class="btn btn-primary" role="button"><i class="fa-regular fa-pen-to-square icon-white"></i></a>&emsp; <a href="/subject" class="btn btn-primary" role="button"><i class="fa-solid fa-trash-can icon-white"></i></a></td>
            </tr>
            
        </table>
    </div>

</div>

@endsection
