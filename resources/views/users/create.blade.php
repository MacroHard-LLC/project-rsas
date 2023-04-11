
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class='modal-content'>
            <div class='modal-header'>
                <h1 class="modal-title fs-5" id="registerModalLabel"><i class="fa-solid fa-circle"></i> CREATE NEW USER</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body mx-5 my-3" id="modalBody">
                <form method="POST" action="/users" id="registerForm" class="needs-validation" novalidate>
                    @csrf
                    <fieldset>
                        <div class="row mb-3">
                            <div class="col-md-6 input-field">
                                <div class="form-outline">
                                    <label for="id" class="input-title">User ID</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="20XXXXXX" name="id" id="idInput" minlength="9" maxlength="9" pattern="[0-9]+" aria-describedby="idError" required autofocus>
                                    <div class="is-invalid" id="idError">
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
                        <div class="container pt-2 input-field">
                            <div class="input-title pb-2">User Role</div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="role" id="studentCheck" value="1" required>
                                <label class="form-check-label" for="studentCheck">Student</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="role" id="adviserCheck" value="2" required>
                                <label class="form-check-label" for="adviserCheck">Adviser</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="role" id="adminCheck" value="0" required>
                                <label class="form-check-label" for="adminCheck">Administrator</label>
                            </div>
                            <div class="is-invalid" id="roleError">
                                <span></span>
                            </div>


                        <!--If student or adviser-->
                        {{-- <div class="no-display" id="student_or_adviser"> --}}
                        <div id="student_or_adviser">
                            <hr>
                            <!--Name-->
                            <div class="row my-3">
                                <div class="col-6 col-md-4 input-field">
                                    <label for="first" class="input-title">First Name</label>
                                    <input type="text" class="form-control form-control-sm invalid-border" placeholder="Ex. Jose" name="first" id="firstInput" minlength="1" maxlength="20" pattern="[a-zA-Z\s]+" aria-describedby="firstError" required>
                                    <div class="is-invalid" id="firstError">
                                        <span></span>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4 input-field">
                                    <label for="middle" class="input-title">Middle Name</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Ex. Protacio" name="middle" id="middleInput" minlength="1" maxlength="20" pattern="[a-zA-Z\s]+" aria-describedby="middleError" required>
                                    <div class="is-invalid" id="middleError">
                                        <span></span>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4 input-field">
                                    <label for="last" class="input-title">Last Name</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Ex. Rizal" name="last" id="lastInput" minlength="1" maxlength="20" pattern="[a-zA-Z\s]+" aria-describedby="lastError" required>
                                    <div class="is-invalid" id="lastError">
                                        <span></span>
                                    </div>
                                </div>
                            </div>

                            <!--Gender-->
                            <div class="input-title pb-2">Gender</div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="maleInput" value="M" required>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="femaleInput" value="F" required>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            <div class="is-invalid" role="alert" id="genderError">
                                <span></span>
                            </div>

                            {{-- If student (RFID)
                            <div class="form-outline pb-2 no-display" id="rfid">
                                <hr>
                                <label for="rfid" class="input-title">RFID Number</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter a N-M digit integer" name="rfid" pattern="[0-9]+" id='rfid_value'>
                            </div> --}}
                        </div>

                        <div class="form-group pt-3 float-end" id="submission">
                            <span class="submit-reminder me-3">Double-check the information before pressing the button</span>
                            <button class="btn btn-primary" type="submit"><i class="fa-solid fa-square-plus icon-white"></i> Create</button>
                        </div>
                    </div>
                    </fieldset>
                </form>
            </div>
        </div>

    </div>

</div>


@section('scripts')
<script src="{{ asset('js/createUser.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $('#registerForm').submit(function (e) {
            e.preventDefault();
            let formData = $(this).serializeArray();
            $(".is-invalid").children("span").text("");
            $("#registerForm input").removeClass("is-invalid");
            $.ajax({
                method: "POST",
                headers: {
                    Accept: "application/json"
                },
                url: "{{ route('register') }}",
                data: formData,
                success: () => window.location.assign("{{ route('home') }}"),
                error: (response) => {
                    if(response.status === 422) {
                        let errors = response.responseJSON.errors;
                        Object.keys(errors).forEach(function (key) {
                            if (key == "role" || key == "gender"){
                                $(name=key).addClass("is-invalid");
                            } else {
                                $("#" + key + "Input").addClass("is-invalid");
                            }
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
