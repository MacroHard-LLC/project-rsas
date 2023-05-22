<link rel="stylesheet" href="{{ asset('css/newsy.css') }}">
<div class="modal fade" id="schoolyearModal" tabindex="-1" role="dialog" aria-labelledby="schoolyearModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class='modal-content'>
            <div class='modal-header'>
                <h1 class="modal-title fs-5 white-label"><i class="fa-solid fa-circle"></i> NEW SCHOOL YEAR</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body mx-2 my-2">
                <form method="POST" action="/users" id="registerSYForm" class="needs-validation" novalidate>
                    @csrf
                    <fieldset>
                        <div class="row my-3">
                            <div class="col-md-6 input-field">
                                <label for="year_start" class="input-title">Year Start</label>
                                <input class="date-own form-control" type="text"  placeholder="20XX" name="year_start" id="year_startInput" minlength="4" maxlength="4" pattern="^(19|20)\d{2}$" aria-describedby="year_startError" required>
                                <div class="is-invalid" id="year_startError">
                                    <span></span>
                                </div>
                            </div>

                            <div class="col-md-6 input-field">
                                <label for="last" class="input-title">Year End</label>
                                <input class="date-own form-control" type="text"  placeholder="20XX" name="year_end" id="year_endInput" minlength="4" maxlength="4" pattern="^(19|20)\d{2}$" aria-describedby="year_endError" required>
                                <div class="is-invalid" id="year_endError">
                                    <span></span>
                                </div>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(function () {
    $('#registerSYForm').submit(function (e) {
        e.preventDefault();
        let formData = $(this).serializeArray();
        console.log(formData);

        $(".is-invalid").children("strong").text("");
        $("#registerForm input").removeClass("is-invalid");
        
        $.ajax({
            method: "POST",
            headers: {
                Accept: "application/json"
            },
            url: "{{ route('add_schoolyear') }}",
            data: formData,
            success: () => window.location.assign(window.location.href),
            error: (response) => {
                if(response.status === 422) {
                    let errors = response.responseJSON.errors;
                    Object.keys(errors).forEach(function (key) {
                        $("#" + key + "Input").addClass("is-invalid");
                        $("#" + key + "Error").children("strong").text(errors[key][0]);
                    });
                }
            }
        })

    });
})
</script>