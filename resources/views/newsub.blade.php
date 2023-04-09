<div class="modal fade" id="registerSubModal" tabindex="-1" role="dialog" aria-labelledby="registerSubModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class='modal-content'>
            <div class='modal-header'>
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Subject</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="POST" action="/subjects" id="registerSubForm" class="needs-validation" novalidate>
                    @csrf
                    <fieldset>
                        <div class="row my-3 gy-4">

                            <div class="col-md-6 input-field">
                                <label for="id" class="input-title">Subject ID</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Input a N-M digit integer" name="sub_id" id="sub_id" minlength="5" maxlength="5" aria-describedby="idError" required autofocus>
                                <div class="is-invalid" role="alert" id="idError">
                                    <strong></strong>
                                </div>
                            </div>

                            <div class="col-md-6 input-field">
                                <label for="subj_name" class="input-title">Subject Name</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Ex. Introduction to Computer Science" name="sub_name" id="sub_name" minlength="1" maxlength="50" aria-describedby="nameError" required>
                                <div class="is-invalid" role="alert" id="nameError">
                                    <strong></strong>
                                </div>
                            </div>

                            <div class="col-md-6 input-field"> 
                                <label for="grade_level" class="input-title">Department ID</label>   
                                <select name="grade_level" class="form-control form-select" placeholder="Choose Department ID" id="grade_level" required>
                                    <option value="1">Dept ID 1</option>
                                    <option value="2">Dept ID 2</option>
                                    <option value="3">Dept ID 3</option>
                                    <option value="4">Dept ID 4</option>
                                </select>
                                <div class="is-invalid" role="alert" id="idError">
                                    <strong></strong>
                                </div>
                            </div>

                            {{---<div class="col-md-6 input-field">
                                <label for="sched_days" class="input-title">Scheduled Days</label>
                                <select id="multiple" name="sched_days" class="js-states form-control" placeholder="Select Scheduled Days"  name="sched_days" id="daysInput" multiple required>
                                  <option value="MON">Monday</option>
                                  <option value="TUE">Tuesday</option>
                                  <option value="WED">Wednesday</option>
                                  <option value="THU">Thursday</option>
                                  <option value="FRI">Friday</option>
                                </select>
                                <div class="is-invalid" role="alert" id="dayError">
                                    <strong></strong>
                                </div>
                            </div>--}}
                            
                            <div class="form-outline w-25 input-field">
                                <label for="time_st" class="input-title">Time Start</label>
                                <input type="time" name="time_st" class="form-control form-control-sm" placeholder="00:00 XM" id="time_st" required>
                                <div class="is-invalid" role="alert" id="timeError">
                                    <strong></strong>
                                </div>
                            </div>
              
                            <div class="form-outline w-25 input-field">
                                    <label for="time_end" class="input-title">Time End</label>
                                    <input type="time" name="time_end" class="form-control form-control-sm" placeholder="00:00 XM" name="time_end" id="timeendInput" maxlength="50" required>
                                    <div class="is-invalid" role="alert" id="timeError">
                                        <strong></strong>
                                    </div>
                                </div>
                
                            <div class="col-md-6 w-50 input-field">
                                    <label for="as_room" class="input-title">Assigned Room</label>
                                    <input type="text" name="as_room" class="form-control form-control-sm" placeholder="Ex. RM 143, Arts and Sciences Building" id="as_room" maxlength="50" required>
                                    <div class="is-invalid" role="alert" id="roomError">
                                        <strong></strong>
                                    </div>
                                </div>
                
                            <div class="form-outline w-25 input-field">
                                    <label for="year_st" class="input-title">Year Start</label>
                                    <input type="text" name="year_st" class="form-control form-control-sm" placeholder="20XX"  name="year_st" id="year_st" required>
                                    <div class="is-invalid" role="alert" id="yearError">
                                        <strong></strong>
                                    </div>
                                </div>
                
                            <div class="form-outline w-25 input-field">
                                    <label for="year_end" class="input-title">Year End</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="20XX"  name="year_end" id="year_end" required>
                                    <div class="is-invalid" role="alert" id="yearError">
                                        <strong></strong>
                                    </div>
                                </div>

                        <div class="form-group pt-3 float-end">
                            <span class="submit-reminder me-3">Double-check the information before pressing the button</span>
                            <button class="btn btn-primary create" type="submit"><i class="fa-solid fa-square-plus icon-white"></i>Create</button>
                        </div>
                    </div>
                    </fieldset>
                </form>
            </div>
        </div>

    </div>

<!-- I don't know where to put the scripts for Scheduled Days, but it's in resources/js (jquery.min.js and select2.min.js)-->

</div>

@section('scripts')
@parent

<script>
$(function () {
    $('#registerSubForm').submit(function (e) {
        e.preventDefault();
        let formData = $(this).serializeArray();
        $(".is-invalid").children("strong").text("");
        $("#registerSubForm input").removeClass("is-invalid");
        $.ajax({
            method: "POST",
            headers: {
                Accept: "application/json"
            },
            url: "{{ route('register_sub') }}",
            data: formData,
            success: () => window.location.assign("{{ route('home') }}"),
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
        console.log(formData);
    });
})
</script>

{{--<script> 
    $("#multiple").select2({
        placeholder: " Select scheduled days",
        allowClear: true
    });
</script>--}}

@endsection
