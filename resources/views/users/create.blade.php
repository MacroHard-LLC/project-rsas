

<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class='modal-content'>
            <div class='modal-header'>
                <h1 class="modal-title fs-5 white-label"><i class="fa-solid fa-circle"></i> CREATE NEW USER</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body mx-2 my-2">
                <form method="POST" action="/users" id="registerForm" class="needs-validation" novalidate>
                    @csrf
                    <fieldset>
                        <div class="row mb-3">
                            <div class="col-md-6 input-field">
                                <div class="form-outline">
                                    <label for="id" class="input-title">User ID</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="20XXXXXX" name="userid" id="idInput" minlength="9" maxlength="9" pattern="[0-9]+" aria-describedby="useridError" required autofocus>
                                    <div class="is-invalid" id="useridError">
                                        <span></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 input-field">
                                <label for="password" class="input-title">User Password</label>
                                <input type="password" class="form-control form-control-sm" placeholder="XXXX" name="password" id="passwordInput" minlength="1" maxlength="20" aria-describedby="passwordError" required>
                                <div class="is-invalid" id="passwordError">
                                    <span></span>
                                </div>
                            </div>
                        </div>

                        <!--User Role-->
                        <div class="row mb-3">
                            <div class="col input-field">
                                <div class="input-title">User Role</div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" id="studentCheck" value="student" required>
                                    <label class="form-check-label" for="studentCheck">Student</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" id="adviserCheck" value="adviser" required>
                                    <label class="form-check-label" for="adviserCheck">Adviser</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" id="adminCheck" value="admin"  required>
                                    <label class="form-check-label" for="adminCheck">Admin</label>
                                </div>

                                <div class="is-invalid" id="roleError">
                                    <span></span>
                                </div>


                            </div>

                        </div>

                        <div class="form-outline input-field pb-2" id="ifStudent">
                            {{-- If student (RFID)--}}
                                <label for="rfid_number" class="input-title">RFID Number</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter a N-M digit integer" name="rfid_number" id='rfid_numberInput' pattern="[0-9]+" aria-describedby="rfid_numberError">
                                <div class="is-invalid" id="rfid_numberError">
                                    <span></span>
                                </div>
                        </div>

                        <!--If student or adviser-->
                        <div id="student_or_adviser">
                            <hr>
                            <!--Name-->
                            <div class="row my-3">
                                <div class="col-6 col-md-4 input-field">
                                    <label for="first" class="input-title">First Name</label>
                                    <input type="text" class="form-control form-control-sm invalid-border" placeholder="Ex. Jose" name="first_name" id="first_nameInput" minlength="1" maxlength="20" pattern="[a-zA-Z\s]+" aria-describedby="firstError" required>
                                    <div class="is-invalid" id="first_nameError">
                                        <span></span>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4 input-field">
                                    <label for="middle" class="input-title">Middle Name</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Ex. Protacio" name="middle_name" id="middle_nameInput" minlength="1" maxlength="20" pattern="[a-zA-Z\s]+" aria-describedby="middleError" required>
                                    <div class="is-invalid" id="middle_nameError">
                                        <span></span>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4 input-field">
                                    <label for="last" class="input-title">Last Name</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Ex. Rizal" name="last_name" id="last_nameInput" minlength="1" maxlength="20" pattern="[a-zA-Z\s]+" aria-describedby="lastError" required>
                                    <div class="is-invalid" id="last_nameError">
                                        <span></span>
                                    </div>
                                </div>
                            </div>

                            <!--Sex-->
                            <div class="input-title pb-2">Gender</div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sex" id="maleInput" value="M" required>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sex" id="femaleInput" value="F" required>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            <div class="is-invalid" role="alert" id="sexError">
                                <span></span>
                            </div>


                        </div>

                        <div class="form-group pt-3 float-end" id="submission">
                            <button class="btn btn-primary" type="submit"><i class="fa-solid fa-square-plus icon-white"></i> Create</button>
                        </div>
                    </div>
                    </fieldset>
                </form>
            </div>
        </div>

    </div>

</div>


@section('create-user-scripts')
<script src="{{ asset('js/createUser.js') }}"></script>
<script type="text/javascript">


    $(function () {
        $('#registerForm').submit(function (e) {
            e.preventDefault();
            let formData = $(this).serializeArray();
            jQuery.each(formData, function(i, field ) {
                if (field.name == "userid")
                    field.name = field.name.replace("userid", "id")
            });
            $("#registerForm").children().find(".is-invalid").children("span").text("");
            $("#registerForm input").removeClass("is-invalid");
            $.ajax({
                method: "POST",
                headers: {
                    Accept: "application/json"
                },
                url: "{{ route('createUser') }}",
                data: formData,
                success: () => window.location.assign(window.location.href),
                error: (response) => {
                    if(response.status === 422) {
                        let errors = response.responseJSON.errors;
                        Object.keys(errors).forEach(function (key) {
                            if (key != "role" || key != "sex"){
                                $("#" + key + "Input").removeClass("is-valid");
                                $("#" + key + "Input").addClass("is-invalid");
                            }

                            if (key == "id")
                                $("#user" + key + "Error").children("span").text(errors[key][0]);
                            else
                                $("#" + key + "Error").children("span").text(errors[key][0]);
                        });
                    } else {
                        window.location.reload();
                    }
                }
            })
        });
    });
</script>
@endsection
