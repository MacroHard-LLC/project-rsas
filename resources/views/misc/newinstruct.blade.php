
<div class="modal fade" id="instructorModal" tabindex="-1" role="dialog" aria-labelledby="instructorModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class='modal-content'>
            <div class='modal-header'>
                <h1 class="modal-title fs-5 white-label"><i class="fa-solid fa-circle"></i> CREATE NEW INSTRUCTOR</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body mx-2 my-2">
                <form id="registerInstForm" class="needs-validation" novalidate>
                    @csrf
                    <fieldset>
                        <div class="form-outline input-field pb-2">
                                <label for="instructor_rfid_number_input" class="input-title">RFID Number</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter a 10-digit number" name="instructor_rfid_number" id='instructor_rfid_number_input' minlength="10" maxlength="10" pattern="[0-9]+" required>
                                <div class="is-invalid" id="instructor_rfid_number_error">
                                    <span></span>
                                </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-6 col-md-4 input-field">
                                <label for="first" class="input-title">First Name</label>
                                <input type="text" class="form-control form-control-sm invalid-border" placeholder="Ex. Jose" name="instructor_first_name" id="instructor_first_name_input" minlength="1" maxlength="20" pattern="[a-zA-Z\s]+" required>
                                <div class="is-invalid" id="instructor_first_name_error">
                                    <span></span>
                                </div>
                            </div>

                            <div class="col-6 col-md-4 input-field">
                                <label for="middle" class="input-title">Middle Name</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Ex. Protacio" name="instructor_middle_name" id="instructor_middle_name_input" minlength="1" maxlength="20" pattern="[a-zA-Z\s]+" required>
                                <div class="is-invalid" id="instructor_middle_name_error">
                                    <span></span>
                                </div>
                            </div>

                            <div class="col-6 col-md-4 input-field">
                                <label for="last" class="input-title">Last Name</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Ex. Rizal" name="instructor_last_name" id="instructor_last_name_input" minlength="1" maxlength="20" pattern="[a-zA-Z\s]+" required>
                                <div class="is-invalid" id="instructor_last_name_error">
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group pt-3 float-end" id="submit_instructor">
                            <button id="createButton" class="btn btn-primary" type="submit"><i class="fa-solid fa-square-plus icon-white"></i> Create</button>
                        </div>
                    </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/createInstructor.js') }}"></script>
<script>
    $(function () {
        $('#registerInstForm').submit(function (e) {
            e.preventDefault();

            let formData = $(this).serializeArray();
            jQuery.each(formData, function(i, field) {
                    field.name = field.name.replace("instructor_", "")
            });

            $("#registerInstForm").children().find(".is-invalid").children("span").text("");
            $("#registerInstForm input").removeClass("is-invalid");

            $.ajax({
                method: "POST",
                headers: {
                    Accept: "application/json"
                },
                url: "{{ route('add_instructor') }}",
                data: formData,
                success: () => window.location.assign(window.location.href),
                error: (response) => {
                    if(response.status === 422) {
                        let errors = response.responseJSON.errors;
                        Object.keys(errors).forEach(function (key) {
                            $("#" + key + "_input").addClass("is-invalid");
                            $("#" + key + "_error").children("strong").text(errors[key][0]);
                        });
                    }
                }
            })
        });
    })
</script>
