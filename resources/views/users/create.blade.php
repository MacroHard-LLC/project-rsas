<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class='modal-content'>
            <div class='modal-header'>
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create New User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                {{-- <form action="/users" method="POST" enctype="multipart/form-data" class="needs-validation"> --}}
                <form method="POST" action="/users">
                    @csrf
                    <fieldset>
                        <div class="row my-3">
                            <div class="col-md-6 input-field">
                                <div class="form-outline">
                                    <label for="id" class="input-title">User ID</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="20XXXXXX" name="id" minlength="9" maxlength="9" pattern="[0-9]+">
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>

                            <div class="col-md-6 input-field">
                                <label for="password" class="input-title">User Password</label>
                                <input type="password" class="form-control form-control-sm" placeholder="XXXX" name="password" maxlength="20">
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>

                        <!--User Role-->
                        <div class="container pt-2 input-field">
                            <div class="input-title pb-2">User Role</div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" onclick="userCheck()" name="role" id="studentCheck" value="1">
                                <label class="form-check-label" for="studentCheck">Student</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" onclick="userCheck()" name="role" id="adviserCheck" value="2">
                                <label class="form-check-label" for="adviserCheck">Adviser</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" onclick="userCheck()" name="role" id="adminCheck" value="0">
                                <label class="form-check-label" for="adminCheck">Administrator</label>
                            </div>

                        <!--If student or adviser-->
                        <div class="no-display" id="student_or_adviser">
                            <hr>
                            <!--Name-->
                            <div class="row my-3">
                                <div class="col-6 col-md-4 input-field">
                                    <label for="first" class="input-title">First Name</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Ex. Jose" name="first" maxlength="20" pattern="[a-zA-Z\s]+">
                                </div>

                                <div class="col-6 col-md-4 input-field">
                                    <label for="middle" class="input-title">Middle Name</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Ex. Protacio" name="middle" maxlength="20" pattern="[a-zA-Z\s]+">
                                </div>

                                <div class="col-6 col-md-4 input-field">
                                    <label for="last" class="input-title">Last Name</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Ex. Rizal" name="last" maxlength="20" pattern="[a-zA-Z\s]+">
                                </div>
                            </div>

                            <!--Gender-->
                            <div class="input-title pb-2">Gender</div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="M">
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="F">
                                <label class="form-check-label" for="female">Female</label>
                            </div>

                            {{-- If student (RFID)
                            <div class="form-outline pb-2 no-display" id="rfid">
                                <hr>
                                <label for="rfid" class="input-title">RFID Number</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter a N-M digit integer" name="rfid" pattern="[0-9]+" id='rfid_value'>
                            </div> --}}
                        </div>

                        <div class="form-group pt-3 float-end">
                            <span class="submit-reminder me-3">Double-check the information before pressing the button</span>
                            <button class="btn btn-primary create" type="submit"><i class="fa-solid fa-square-plus icon-white"></i>Create</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

    </div>

</div>

