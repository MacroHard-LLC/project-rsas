
<div class="modal fade" id="instructorModal" tabindex="-1" role="dialog" aria-labelledby="instructorModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class='modal-content'>
            <div class='modal-header'>
                <h1 class="modal-title fs-5 white-label"><i class="fa-solid fa-circle"></i> CREATE NEW INSTRUCTOR</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body mx-2 my-2">
                <form method="POST" action="/users" id="registerInstForm" class="needs-validation" novalidate>
                    @csrf
                    <fieldset>
                        <div class="form-outline input-field pb-2">

                                <label for="instructor_rfid_number_input" class="input-title">RFID Number</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter a N-M digit integer" name="instructor_rfid_number" id='instructor_rfid_number_input' minlength="10" maxlength="10" pattern="[0-9]+" aria-describedby="instructor_rfid_number_error" required>
                                <div class="is-invalid" id="instructor_rfid_number_error">
                                    <span></span>
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

<script src="{{ asset('js/addInstructor.js') }}"></script>
<script>
    $(function () {
        $('#registerInstForm').submit(function (e) {
            e.preventDefault();
            let formData = $(this).serializeArray();
            jQuery.each(formData, function(i, field) {
                if (field.name == "instructor_rfid_number")
                    field.name = field.name.replace("instructor_rfid_number", "rfid_number")
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
                            $("#instructor_" + key + "_input").addClass("is-invalid");
                            $("#instructor_" + key + "_error").children("strong").text(errors[key][0]);
                        });
                    }
                }
            })
        });
    })
</script>
