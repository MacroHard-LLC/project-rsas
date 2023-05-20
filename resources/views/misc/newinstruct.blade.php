
<div class="modal fade" id="instructorModal" tabindex="-1" role="dialog" aria-labelledby="instructorModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class='modal-content'>
            <div class='modal-header'>
                <h1 class="modal-title fs-5 white-label"><i class="fa-solid fa-circle"></i> CREATE NEW INSTRUCTOR</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body mx-2 my-2">
                <form method="POST" action="/users" id="registerForm" class="needs-validation" novalidate>
                    @csrf
                    <fieldset>
                        <div class="form-outline input-field pb-2">

                                <label for="rfid_number" class="input-title">RFID Number</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter a N-M digit integer" name="rfid_number" id='rfid_numberInput' pattern="[0-9]+" aria-describedby="rfid_numberError">
                                <div class="is-invalid" id="rfid_numberError">
                                    <span></span>
                                </div>
                        </div>
                        <div class="form-group pt-3 float-end" id="submission">
                            <!--<span class="submit-reminder me-3">Double-check the information before pressing the button</span>-->
                            <button class="btn btn-primary" type="submit"><i class="fa-solid fa-square-plus icon-white"></i> Create</button>
                        </div>
                    </div>
                    </fieldset>
                </form>
            </div>
        </div>

    </div>

</div>