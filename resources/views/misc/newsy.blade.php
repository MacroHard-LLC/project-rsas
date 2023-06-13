<div class="modal fade" id="schoolyearModal" tabindex="-1" role="dialog" aria-labelledby="schoolyearModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class='modal-content'>
            <div class='modal-header'>
                <h1 class="modal-title fs-5 white-label"><i class="fa-solid fa-circle"></i> NEW SCHOOL YEAR</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body mx-2 my-2">
                <form method="POST" id="registerSYForm" class="needs-validation" novalidate>
                    @csrf
                    <fieldset>
                        <div class="row my-3">
                            <div class="col-md-6 input-field">
                                <label for="start_year_input" class="input-title">Year Start</label>
                                <input class="date-own form-control" type="text"  placeholder="20XX" name="start_year" id="start_year_input" minlength="4" maxlength="4" pattern="^(19|20)\d{2}$" aria-describedby="start_year_error" required>
                                <div class="is-invalid" id="start_year_error">
                                    <span></span>
                                </div>
                            </div>

                            <div class="col-md-6 input-field">
                                <label for="end_year_input" class="input-title">Year End</label>
                                <input class="date-own form-control" type="text"  placeholder="20XX" name="end_year" id="end_year_input" minlength="4" maxlength="4" pattern="^(19|20)\d{2}$" aria-describedby="end_year_error" required>
                                <div class="is-invalid" id="end_year_error">
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-md-6 input-field">
                                <label for="start_date_input" class="input-title">Start Date</label>
                                <input class="date-own form-control" type="date"  name="start_date" id="start_date_input" required>
                                <div class="is-invalid" id="start_date_error">
                                    <span></span>
                                </div>
                            </div>

                            <div class="col-md-6 input-field">
                                <label for="end_date_input" class="input-title">End Date</label>
                                <input class="date-own form-control" type="date" name="end_date" id="end_date_input" required>
                                <div class="is-invalid" id="end_date_error">
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group pt-3 float-end" id="submit_schoolyear" style="visibility:hidden">
                            <button class="btn btn-primary" type="submit"><i class="fa-solid fa-square-plus icon-white"></i> Create</button>
                        </div>
                    </div>
                    </fieldset>
                </form>
            </div>
        </div>

    </div>

</div>

<script src="{{ asset('js/createSchoolyear.js') }}"></script>
<script>
$(function () {
    // Function to set the min and max values of date inputs
    function setMinMaxDates() {
        var startYear = parseInt($('#start_year_input').val());
        var endYear = parseInt($('#end_year_input').val());

        // Set min and max values for start_date input
        $('#start_date_input').attr('min', startYear + '-01-01');
        $('#start_date_input').attr('max', startYear + '-12-31');

        // Set min and max values for end_date input
        $('#end_date_input').attr('min', endYear + '-01-01');
        $('#end_date_input').attr('max', endYear + '-12-31');
    }

    // Call setMinMaxDates initially on page load
    setMinMaxDates();

    // Event listener to update min and max values when start_year or end_year changes
    $('#start_year_input, #end_year_input').on('input', function () {
        setMinMaxDates();
    });

    $('#registerSYForm').submit(function (e) {
        e.preventDefault();
        let formData = $(this).serializeArray();

        $(".is-invalid").children("strong").text("");
        $("#registerSYForm input").removeClass("is-invalid");

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
                        $("#" + key + "_input").addClass("is-invalid");
                        $("#" + key + "_error").children("strong").text(errors[key][0]);
                    });
                }
            }
        })

    });
})

// $(function () {

// });
</script>
