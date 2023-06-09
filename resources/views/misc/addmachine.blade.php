<div class="modal fade" id="addmachineModal" tabindex="-1" role="dialog" aria-labelledby="addmachineModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class='modal-content'>
            <div class='modal-header'>
                <h1 class="modal-title fs-5" id="registerModalLabel"><i class="fa-solid fa-circle"></i> ADD MACHINE</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body mx-2 my-2">
                <form method="POST" action="/addmachine" id="addmachineForm" class="needs-validation" novalidate>
                    @csrf
                    <fieldset>
                        <div class="row my-3">

                            <!-- needed -->
                            <!-- for the room name -->
                            <div class="col-md-6 input-field">
                                <label for="room" class="input-title">Room Name</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Ex. Room 123" name="room" id="room" minlength="1" maxlength="50" aria-describedby="nameError" required>
                                <div class="is-invalid" role="alert" id="nameError" name="nameError" style="visibility:hidden">
                                    <strong>Check if Room Name is a legal string</strong>
                                </div>
                            </div>



                            <!-- needed for room status -->
                            <div class="col-md-6 input-field">
                            <div class="input-title pb-2">Machine Status</div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="role" id="availableCheckU" value="1" required>
                                <label class="form-check-label" for="availableCheck">Available</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="role" id="unavailableCheckU" value="0" required>
                                <label class="form-check-label" for="unavailableCheck">Unavailable</label>
                            </div>
                            <div class="is-invalid" id="roleErrorU">
                                <span></span>
                            </div>
                        </div>


                        <div class="form-group float-end">
                            <button class="btn btn-primary" type="submit" id="sbmt_btn"><i class="fa-solid fa-square-plus icon-white"></i> Add Machine</button>
                        </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
