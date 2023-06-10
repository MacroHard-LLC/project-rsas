<div class="modal fade" id="updateUserModal" tabindex="-1" role="dialog" aria-labelledby="updateUserModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class='modal-content'>
            <div class='modal-header'>
                <h1 class="modal-title fs-5 white-label"><i class="fa-solid fa-circle"></i> EDIT USER</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                    <form id="updateUserForm" class="needs-validation" novalidate>
                    @csrf
                    <fieldset>
                        <div class="row mb-3">
                            <div class="col-md-6 input-field">
                                <div class="form-outline">
                                    <label for="idInputU" class="input-title">User ID</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="20XXXXXX" name="id" id="idInputU" minlength="9" maxlength="9" pattern="[0-9]+" aria-describedby="idError" required>
                                    <div class="is-invalid" id="idErrorU">
                                        <span></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 input-field">
                                <label for="passwordInputU" class="input-title">User Password</label>
                                <input type="password" class="form-control form-control-sm" placeholder="XXXX" name="password" id="passwordInputU" minlength="1" maxlength="20" aria-describedby="passwordError" required>
                                <div class="is-invalid" id="passwordErrorU">
                                    <span></span>
                                </div>
                            </div>
                        </div>

                        <!--User Role-->
                        <div class="container pt-2 input-field">
                            <div class="input-title pb-2">User Role</div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="role" id="studentCheckU" value="student" required>
                                <label class="form-check-label" for="studentCheck">Student</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="role" id="adviserCheckU" value="adviser" required>
                                <label class="form-check-label" for="adviserCheck">Adviser</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="role" id="adminCheckU" value="admin" required>
                                <label class="form-check-label" for="adminCheck">Administrator</label>
                            </div>
                            <div class="is-invalid" id="roleErrorU">
                                <span></span>
                            </div>


                        <div class="form-outline input-field pb-2" id="ifStudentU">
                            {{-- If student (RFID)--}}
                                <label for="rfid_number" class="input-title">RFID Number</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter a N-M digit integer" name="rfid_number" id='rfid_numberInputU' pattern="[0-9]+" aria-describedby="rfid_numberError">
                                <div class="is-invalid" id="rfid_numberErrorU">
                                    <span></span>
                                </div>
                        </div>


                        <!--If student or adviser-->
                        <div id="student_or_adviser">
                            <hr>
                            <!--Name-->
                            <div class="row my-3">
                                <div class="col-6 col-md-4 input-field">
                                    <label for="first_nameInputU" class="input-title">First Name</label>
                                    <input type="text" class="form-control form-control-sm invalid-border" placeholder="Ex. Jose" name="first_name" id="first_nameInputU" minlength="1" maxlength="20" pattern="[a-zA-Z\s]+" aria-describedby="firstError" required>
                                    <div class="is-invalid" id="first_nameErrorU">
                                        <span></span>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4 input-field">
                                    <label for="middle_nameInputU" class="input-title">Middle Name</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Ex. Protacio" name="middle_name" id="middle_nameInputU" minlength="1" maxlength="20" pattern="[a-zA-Z\s]+" aria-describedby="middleError" required>
                                    <div class="is-invalid" id="middle_nameErrorU">
                                        <span></span>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4 input-field">
                                    <label for="last_nameInputU" class="input-title">Last Name</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Ex. Rizal" name="last_name" id="last_nameInputU" minlength="1" maxlength="20" pattern="[a-zA-Z\s]+" aria-describedby="lastError" required>
                                    <div class="is-invalid" id="last_nameErrorU">
                                        <span></span>
                                    </div>
                                </div>
                            </div>

                            <!--Sex-->
                            <div class="input-title pb-2">Sex</div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sex" id="maleInputU" value="M" required>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sex" id="femaleInputU" value="F" required>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            <div class="is-invalid" role="alert" id="sexErrorU">
                                <span></span>
                            </div>
                        </div>

                        <input type="hidden" name="originalID" id="originalID" value="">

                        <div class="form-group pt-3 float-end" id="submissionU">
                            <button class="btn btn-primary" type="submit"><i class="fa-solid fa-floppy-disk fa-lg icon-white"></i> Save</button>
                        </div>
                    </div>
                    </fieldset>
                </form>
            </div>
        </div>

    </div>

</div>

@section('update-user-scripts')
<script src="{{ asset('js/updateUser.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $('#updateUserForm').submit(function (e) {
            e.preventDefault();
            let formData = $(this).serializeArray();
            formData.push({name: '_method', value:'PUT'});
            var id = $('#originalID').val();
            $("#updateUserForm").children().find(".is-invalid").children("span").text("");
            $("#updateUserForm input").removeClass("is-invalid");
            $.ajax({
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    Accept: "application/json"
                },
                url: '/users/' + id,
                data: formData,
                success: () => window.location.assign(window.location.href),
                error: (response) => {
                    if(response.status === 422) {
                        let errors = response.responseJSON.errors;
                        Object.keys(errors).forEach(function (key) {
                            if (key != "role" || key != "sex"){
                                $("#" + key + "InputU").removeClass("is-valid");
                                $("#" + key + "InputU").addClass("is-invalid");
                            }

                            $("#" + key + "ErrorU").children("span").text(errors[key][0]);
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
