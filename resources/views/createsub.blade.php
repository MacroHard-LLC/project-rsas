<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Create New Subject</title>
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/47cd24d297.js" crossorigin="anonymous"></script> --}}
  @vite(['resources/js/app.js'])
  <link rel="stylesheet" href="{{ asset('css/createsub.css') }}">
  <script src="https://kit.fontawesome.com/47cd24d297.js" crossorigin="anonymous"></script>
</head>

<body>

    <!--NAVBAR-->
    <nav class="navbar navbar-expand-sm navbar-custom navbar-dark">
        <div class="container-fluid">
            <div class="navbar-brand">
                <i class="fa-solid fa-circle-plus icon-white"></i>
                Create New Subject
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="#" title="View Account"><i class="fa-solid fa-user icon-white"> John Doe</i></a>
                  </li>  
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"></a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-wrench"></i> Preferences</a></li>
                      <li><a class="dropdown-item" href="#"><i class="fa-solid fa-gear"></i> Settings</a></li>
                      <div class="dropdown-divider"></div>
                      <li><a class="dropdown-item" href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
        </div>
      </nav>

    
    <!--FORM -->
    <div class="container pt-5">
    <form action="dataInsert" method="post" enctype="multipart/form-data" class="needs-validation">
        @csrf
      <fieldset>
        <div class="row my-3 gy-4">
            <div class="col-md-6 input-field">
                <div class="form-outline">
                <label for="subj_id" class="input-title">Subject ID</label>
                <input type="text" class="form-control form-control-sm" placeholder="Input a N-M digit integer" name="subj_id" minlength="5" maxlength="5" pattern="[0-5]+" required>
                <div class="valid-feedback">Looks good!</div>
                </div>
            </div>

            <div class="col-md-6 input-field">
                    <label for="subj_name" class="input-title">Subject Name</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Ex. Introduction to Computer Science" name="subj_name" maxlength="50" required>
                    <div class="valid-feedback">Looks good!</div>
            </div>

            <div class="col-md-6 input-field">
              <div class="form-outline">
              <label for="dept_id" class="input-title">Department ID</label>   
                <select class="form-control form-select" name="dept_id">
                  <option>Choose Department ID</option>
                  <option value="1">Dept ID 1</option>
                  <option value="2">Dept ID 2</option>
                  <option value="3">Dept ID 3</option>
                  <option value="4">Dept ID 4</option>
                </select>
              </div>
            </div>

          <div class="col-md-6 input-field">
                  <label for="sched_days" class="input-title">Scheduled Days</label>
                  <input type="text" class="form-control form-control-sm" placeholder="Ex. Monday, Tuesday" name="sched_days" id="timepicker" required>
                  <div class="valid-feedback">Looks good!</div>
          </div>
          
          <div class="form-outline w-25 input-field">
                  <label for="time_start" class="input-title">Time Start</label>
                  <input type="text" class="form-control form-control-sm" placeholder="00:00 XM" name="time_start" maxlength="50" id="timepicker" required>
                  <div class="valid-feedback">Looks good!</div>
          </div>

          <div class="form-outline w-25 input-field">
                  <label for="time_end" class="input-title">Time End</label>
                  <input type="text" class="form-control form-control-sm" placeholder="00:00 XM" name="time_end" maxlength="50" required>
                  <div class="valid-feedback">Looks good!</div>
          </div>

          <div class="col-md-6 w-50 input-field">
                  <label for="assign_room" class="input-title">Assigned Room</label>
                  <input type="text" class="form-control form-control-sm" placeholder="Ex. RM 143, Arts and Sciences Building" name="assign_room" maxlength="50" required>
                  <div class="valid-feedback">Looks good!</div>
          </div>

        </div>

        <div class="form-group pt-3 float-end">
          <span class="submit-reminder me-3">Double-check the information before pressing the button</span>
          <button class="btn btn-primary create" type="submit"><i class="fa-solid fa-square-plus icon-white"></i>  Create</button>
        </div>

    </div>

    
            
    </div>
    </div>

    
  </fieldset>
    </form>

    

</body>
