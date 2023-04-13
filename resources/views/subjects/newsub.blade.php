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
                                <label for="id" class="input-title" >Subject ID</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Input a 5 digit integer" name="sub_id" id="sub_id" minlength="5" maxlength="5" aria-describedby="idError" required autofocus>
                                <div class="is-invalid" role="alert" id="idError" name="idError" style="visibility:hidden">
                                    <strong>Check if Subject ID is all integers</strong>
                                </div>
                            </div>

                            <div class="col-md-6 input-field">
                                <label for="sub_name" class="input-title">Subject Name</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Ex. Introduction to Computer Science" name="sub_name" id="sub_name" minlength="1" maxlength="50" aria-describedby="nameError" required>
                                <div class="is-invalid" role="alert" id="nameError" name="nameError" style="visibility:hidden">
                                    <strong>Check if Subject Name is a legal string</strong>
                                </div>
                            </div>

                            <div class="col-md-6 w-50 input-field">
                                <label for="grade_level" class="input-title">Grade Level</label>
                                <select name="grade_level" class="form-control form-select" placeholder="Choose Department ID" id="grade_level" required>
                                    <option value="1">Level 1</option>
                                    <option value="2">Level 2</option>
                                    <option value="3">Level 3</option>
                                    <option value="4">Level 4</option>
                                    <option value="5">Level 5</option>
                                    <option value="6">Level 6</option>
                                    <option value="7">Level 7</option>
                                    <option value="8">Level 8</option>
                                    <option value="9">Level 9</option>
                                    <option value="10">Level 10</option>
                                </select>
                                <div class="is-invalid" role="alert" id="gradeError" name="gradeError">
                                    <strong></strong>
                                </div>
                            </div>

                            <div class="form-outline w-25 input-field">
                                <label for="time_st" class="input-title">Time Start</label>
                                <input type="time" name="time_st" class="form-control form-control-sm" placeholder="00:00 XM" id="time_st" required>
                                <div class="is-invalid" role="alert" id="timeStartError" name="timeStartError" style="visibility:hidden">
                                    <strong>Input the correct time format</strong>
                                </div>
                            </div>

                            <div class="form-outline w-25 input-field">
                                    <label for="time_end" class="input-title">Time End</label>
                                    <input type="time" class="form-control form-control-sm" placeholder="00:00 XM" name="time_end" id="time_end" maxlength="50" required>
                                    <div class="is-invalid" role="alert" id="timeEndError" name="timeEndError" style="visibility:hidden">
                                        <strong>Input the correct time format</strong>
                                    </div>
                                </div>

                            <div class="col-md-6 w-50 input-field">
                                    <label for="as_room" class="input-title">Assigned Room</label>
                                    <input type="text" name="as_room" class="form-control form-control-sm" placeholder="Ex. RM 143, Arts and Sciences Building" id="as_room" maxlength="20" required>
                                    <div class="is-invalid" role="alert" id="roomError" name="roomError" style="visibility:hidden">
                                        <strong>Check if Subject Name is a legal string</strong>
                                    </div>
                                </div>

                            <div class="form-outline w-25 input-field">
                                    <label for="year_st" class="input-title">Year Start</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="20XX"  name="year_st" id="year_st" required maxlength="4">
                                    <div class="is-invalid" role="alert" id="yearStartError" name="yearStartError" style="visibility:hidden">
                                        <strong>Input a valid year</strong>
                                    </div>
                                </div>

                            <div class="form-outline w-25 input-field">
                                    <label for="year_end" class="input-title">Year End</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="20XX"  name="year_end" id="year_end" required maxlength="4">
                                    <div class="is-invalid" role="alert" id="yearEndError" name="yearEndError" style="visibility:hidden">
                                        <strong>Input a valid year</strong>
                                    </div>
                                </div>

                            <div class="container pt-2 input-field">
                                <div class="input-title pb-2">Scheduled Days</div>
                                <div class="d-flex justify-content-between">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="MondayCheck" value="MON">
                                        <label class="form-check-label" for="MondayCheck">Monday</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="TuesdayCheck" value="TUE">
                                        <label class="form-check-label" for="TuesdayCheck">Tuesday</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="WednesdayCheck" value="WED">
                                        <label class="form-check-label" for="WednesdayCheck">Wednesday</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="ThursdayCheck" value="THU">
                                        <label class="form-check-label" for="ThursdayCheck">Thursday</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="FridayCheck" value="FRI">
                                        <label class="form-check-label" for="FridayCheck">Friday</label>
                                    </div>
                                </div>
                                <div class="is-invalid" role="alert" id="daysError" name="daysError" style="visibility:hidden">
                                    <strong>Please check at least one of the days</strong>
                                </div>
                            </div>

                        <div class="form-group pt-3 float-end">
                            <span class="submit-reminder me-3">Double-check the information before pressing the button</span>
                            <button class="btn btn-primary create" type="submit" id="sbmt_btn" disabled><i class="fa-solid fa-square-plus icon-white"></i>Create</button>
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
        console.log(formData);

        let selectedDays = [];

        // Iterate over checked checkboxes and add their values to the selectedDays array
        $("input[type='checkbox']:checked").each(function() {
            selectedDays.push($(this).val());
        });
        formData.push({name: 'days', value: selectedDays});
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

    });
})

// disable the button if inputs are not present
$('#MondayCheck,#TuesdayCheck,#WednesdayCheck,#ThursdayCheck,#FridayCheck,#sub_id,#sub_name,#time_st,#time_end,#as_room,#year_st,#year_end').on('keypress keyup keydown click', function () {
  if ( $('#sub_id').val().match('^[0-9]{5}$') && $('#sub_id').val().length === 5 && $('#sub_id').val() != "" && $('#sub_name').val() != "" && $('#time_st').val() != "" && $('#time_end').val() != "" && $('#as_room').val() != "" && $('#year_st').val() != "" && $('#year_end').val() != "" && ($('#MondayCheck').is(':checked') || $('#TuesdayCheck').is(':checked') || $('#WednesdayCheck').is(':checked') || $('#ThursdayCheck').is(':checked') || $('#FridayCheck').is(':checked')))  {
    $('#sbmt_btn').prop('disabled', false);
  }
  else {
    $('#sbmt_btn').prop('disabled', true);
  }


// validation for subject name
if ($('#sub_name').val().length == 0){
    $('#nameError.is-invalid').css('visibility','hidden');
}
else if (!$('#sub_name').val().match('^[0-9a-zA-Z_ ,.]{0,50}$')) {
    console.log('hooter');
    $('#nameError.is-invalid').css('visibility','visible');
    $('#sbmt_btn').prop('disabled', true);
}
else{
    $('#nameError.is-invalid').css('visibility','hidden');
};
// validation for year start
if ($('#year_st').val().length == 0 || $('#year_st').val().match('^[0-9]{4}$')){
    $('#yearStartError.is-invalid').css('visibility','hidden');
}
else{
    $('#yearStartError.is-invalid').css('visibility','visible');
    $('#sbmt_btn').prop('disabled', true);
};
// validation for year end
if ($('#year_end').val().length == 0 || $('#year_end').val().match('^[0-9]{4}$')){
    $('#yearEndError.is-invalid').css('visibility','hidden');
}
else{
    $('#yearEndError.is-invalid').css('visibility','visible');
    $('#sbmt_btn').prop('disabled', true);
};

});

$('#time_st').on('keypress keyup keydown', function () {
    // validation for time start
if ($('#time_st').val().length == 0){
    $('#timeStartError.is-invalid').css('visibility','visible');
    $('#sbmt_btn').prop('disabled', true);
}
else{
    $('#timeStartError.is-invalid').css('visibility','hidden');
};
});

$('#time_end').on('keypress keyup keydown', function () {
    // validation for time end
if ($('#time_end').val().length == 0){
    $('#timeEndError.is-invalid').css('visibility','visible');
    $('#sbmt_btn').prop('disabled', true);
}
else{
    $('#timeEndError.is-invalid').css('visibility','hidden');
};
});

$('#MondayCheck,#TuesdayCheck,#WednesdayCheck,#ThursdayCheck,#FridayCheck').on('click', function () {
    // validation for time end
    let selectedDays = [];

    // Iterate over checked checkboxes and add their values to the selectedDays array
    $("input[type='checkbox']:checked").each(function() {
        selectedDays.push($(this).val());
    });
    if (selectedDays.length === 0){
        $('#daysError.is-invalid').css('visibility','visible');
        $('#sbmt_btn').prop('disabled', true);
    }
    else{
        $('#daysError.is-invalid').css('visibility','hidden');
    };
});

$('#as_room').on('keypress keyup keydown', function () {
    // validation for time end
if ($('#as_room').val().length == 0 || $('#as_room').val().match('^[0-9a-zA-Z_ ,.]{0,50}$')){
    $('#roomError.is-invalid').css('visibility','hidden');
}
else{
    $('#roomError.is-invalid').css('visibility','visible');
    $('#sbmt_btn').prop('disabled', true);
};
});

$('#sub_id').on('keyup', function () {
    $('#idError.is-invalid').html('<strong>Check if Subject ID is all integers</strong>');
  if ($(this).val().length === 5) {
    console.log($(this).val());
    $.ajax({
      method: "POST",
      headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            Accept: "application/json"
      },
      url: "{{ route('check_id') }}",
      data: { input_data: $(this).val() },
      success: function(data) {
        if (data.exists && $('#sub_id').val().match('^[0-9]{5}$')) {
            $('#idError.is-invalid').css('visibility','visible');
          $('#idError.is-invalid').html('<strong>Subject Already Exists</strong>');
          $('#sbmt_btn').prop('disabled', true);
        }
        else if (!$('#sub_id').val().match('^[0-9]{5}$'))
        {
            $('#idError.is-invalid').html('<strong>Check if Subject ID is all integers</strong>');
            $('#idError.is-invalid').css('visibility','visible');
            $('#sbmt_btn').prop('disabled', true);
        }
        else
        {
            $('#idError.is-invalid').css('visibility','hidden');
        }
      }
    });
  }
  else{
    // validation for subject id
    if ($('#sub_id').val().length == 0){
        $('#idError.is-invalid').css('visibility','hidden');
    }
    else if (!$('#sub_id').val().match('^[0-9]{5}$')){
        $('#sbmt_btn').prop('disabled', true);
        $('#idError.is-invalid').css('visibility','visible');
    }
    else{
        $('#idError.is-invalid').css('visibility','hidden');
    }
  }
});

</script>
@endsection
