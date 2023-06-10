<div class="modal fade" id="addMachineModal" tabindex="-1" role="dialog" aria-labelledby="addMachineModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class='modal-content'>
            <div class='modal-header'>
                <h1 class="modal-title fs-5" id="registerModalLabel"><i class="fa-solid fa-circle"></i> ADD MACHINE</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body mx-2 my-2">
                <form method="POST" id="addMachineForm" class="needs-validation" novalidate>
                    @csrf
                    <fieldset>
                        <div class="row my-3">

                            <!-- needed -->
                            <!-- for the room name -->
                            <div class="col-md-6 input-field">
                                <label for="machine_room_input" class="input-title">Room Name</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Ex. Room 123" name="machine_room" id="machine_room_input" pattern='^[a-zA-Z0-9_\s]*$' minlength="1" maxlength="20" required>
                                <div class="is-invalid" id="machine_room_error">
                                    <span></span>
                                </div>
                            </div>



                            <!-- needed for room status -->
                            <div class="col-md-6 input-field">
                            <div class="input-title pb-2">Machine Status</div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="machine_status" id="machine_status_available" value="1" required>
                                <label class="form-check-label" for="machine_status_available">Available</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="machine_status" id="machine_status_unavailable" value="0" required>
                                <label class="form-check-label" for="machine_status_unavailable">Unavailable</label>
                            </div>
                            <div class="is-invalid" id="machine_status_error">
                                <span></span>
                            </div>
                        </div>


                        <div class="form-group float-end" style="visibility:hidden">
                            <button class="btn btn-primary" type="submit" id="submitNewMachine"><i class="fa-solid fa-square-plus icon-white"></i> Add Machine</button>
                        </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/addMachine.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $('#addMachineForm').submit(function (e) {
            e.preventDefault();
            let formData = $(this).serializeArray();
            jQuery.each(formData, function(i, field ) {
                field.name = field.name.replace("machine_", "")
            });
            $("#addMachineForm").children().find(".is-invalid").children("span").text("");
            $("#addMachineForm input").removeClass("is-invalid");
            $.ajax({
                method: "POST",
                headers: {
                    Accept: "application/json"
                },
                url: "{{ route('addMachine') }}",
                data: formData,
                success: () => window.location.assign(window.location.href),
                error: (response) => {
                    if(response.status === 422) {
                        let errors = response.responseJSON.errors;
                        Object.keys(errors).forEach(function (key) {
                            $("#machine_" + key + "_error").children("span").text(errors[key][0]);
                        });
                    } else {
                        window.location.reload();
                    }
                }
            })
        });
    });
</script>
