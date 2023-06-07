<div class="modal fade" id="registerSubModal" tabindex="-1" role="dialog" aria-labelledby="registerSubModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class='modal-content'>
            <div class='modal-header'>
                <h1 class="modal-title fs-5" id="registerModalLabel"><i class="fa-solid fa-circle"></i> CREATE NEW SUBJECT</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="POST" action="/subjects" id="registerSubForm" class="needs-validation" novalidate>
                    @csrf
                    <fieldset>
                        <div class="row">

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
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 col-md-4 input-field">
                                <label for="grade_level" class="input-title">Grade Level</label>
                                <select name="grade_level" class="form-select" id="grade_level" required>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                                <!--validation needs to be updated, also this kind of error message makes an unnecessary bottom margin :((
                                <div class="is-invalid" role="alert" id="gradeError" name="gradeError">
                                    <strong></strong>
                                </div>-->
                            </div>

                            <div class="col-6 col-md-4 input-field">
                                <label for="school_yearDD" class="input-title">School Year</label>
                                <select name="school_yearDD" class="form-select" id="school_yearDD" required>
                                    <!--ideally the options that would show here is the school_year_id present in the school year table-->

                                </select>
                                <!--validation needs to be updated
                                <div class="is-invalid" role="alert" id="timeStartError" name="timeStartError" style="visibility:hidden">
                                    <strong>Input the correct time format</strong>
                                </div>-->
                            </div>

                            <div class="col-6 col-md-4 input-field">
                                    <label for="semester" class="input-title">Semester</label>
                                    <select name="semester" class="form-select" id="semester" required>
                                        <!--ideally the options that would show here is the school_year_id present in the school year table-->
                                        <option value="first_sem">First Semester</option>
                                        <option value="second_sem">Second Semester</option>
                                    </select>
                                    <!--validation needs to be updated
                                    <div class="is-invalid" role="alert" id="timeEndError" name="timeEndError" style="visibility:hidden">
                                        <strong>Input the correct time format</strong>
                                    </div>-->
                            </div>
                        </div>
<<<<<<< Updated upstream
=======
                        
>>>>>>> Stashed changes
                        <div class="row">
                            <div class="col-md-6 input-field">
                                    <label for="as_room" class="input-title">Assigned Room</label>
                                    <input type="text" name="as_room" class="form-control form-control-sm" placeholder="Ex. RM 143, Arts and Sciences Building" id="as_room" maxlength="20" required>
                                    <div class="is-invalid" role="alert" id="roomError" name="roomError" style="visibility:hidden">
                                        <strong>Check if Subject Name is a legal string</strong>
                                    </div>
                                </div>

                            <div class="col-md-6 input-field">
                                    <label for="instruct_rfid" class="input-title">Instructor RFID</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Enter a N-M digit integer" name="instruct_rfid" pattern="[0-9]+" id='instruct_rfid' required>
                                    <!--validation needs to be updated-->
                                    <div class="is-invalid" role="alert" id="subjectRFIDError" name="subjectRFIDError" style="visibility:hidden">
                                        <strong>Input a RFID number</strong>
                                    </div>
                                </div>

                        </div>
                        <div class="form-inline">
                            <div class="container pt-2 input-field">
                                <div class="row input-title pb-2">
                                <div class="col">Scheduled Days</div>
                                <div class="col">Time Start</div>
                                <div class="col">Time End</div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-6 col-md-4">
                                        <div class="form-check pb-2">
                                            <input class="form-check-input" type="checkbox" id="MondayCheck" value="MON">
                                            <label class="form-check-label" for="MondayCheck">Monday</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="form-outline input-field">
                                            <input type="time" name="mon_time_st" class="form-control form-control-sm" placeholder="00:00 XM" id="mon_time_st">
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="form-outline input-field">
                                            <input type="time" class="form-control form-control-sm" placeholder="00:00 XM" name="mon_time_end" id="mon_time_end">
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-6 col-md-4">
                                        <div class="form-check pb-2">
                                            <input class="form-check-input" type="checkbox" id="TuesdayCheck" value="TUE">
                                            <label class="form-check-label" for="TuesdayCheck">Tuesday</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="form-outline input-field">
                                            <input type="time" name="tue_time_st" class="form-control form-control-sm" placeholder="00:00 XM" id="tue_time_st">
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="form-outline input-field">
                                            <input type="time" class="form-control form-control-sm" placeholder="00:00 XM" name="tue_time_end" id="tue_time_end">
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-6 col-md-4">
                                        <div class="form-check pb-2">
                                            <input class="form-check-input" type="checkbox" id="WednesdayCheck" value="WED">
                                            <label class="form-check-label" for="WednesdayCheck">Wednesday</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="form-outline input-field">
                                            <input type="time" name="wed_time_st" class="form-control form-control-sm" placeholder="00:00 XM" id="wed_time_st">
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="form-outline input-field">
                                            <input type="time" class="form-control form-control-sm" placeholder="00:00 XM" name="wed_time_end" id="wed_time_end">
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-6 col-md-4">
                                        <div class="form-check pb-2">
                                            <input class="form-check-input" type="checkbox" id="ThursdayCheck" value="THU">
                                            <label class="form-check-label" for="ThursdayCheck">Thursday</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="form-outline input-field">
                                            <input type="time" name="thu_time_st" class="form-control form-control-sm" placeholder="00:00 XM" id="thu_time_st">
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="form-outline input-field">
                                            <input type="time" class="form-control form-control-sm" placeholder="00:00 XM" name="thu_time_end" id="thu_time_end">
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-6 col-md-4">
                                        <div class="form-check pb-2">
                                            <input class="form-check-input" type="checkbox" id="FridayCheck" value="FRI">
                                            <label class="form-check-label" for="FridayCheck">Friday</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="form-outline input-field">
                                            <input type="time" name="fri_time_st" class="form-control form-control-sm" placeholder="00:00 XM" id="fri_time_st">
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="form-outline input-field">
                                            <input type="time" class="form-control form-control-sm" placeholder="00:00 XM" name="fri_time_end" id="fri_time_end">
                                        </div>
                                    </div>
                                </div>

                                <div class="is-invalid" role="alert" id="daysError" name="daysError" style="visibility:hidden">
                                    <strong>Please check at least one of the days</strong>
                                </div>
                            </div>

                        <div class="form-group float-end">
                            <!--<span class="submit-reminder me-3">Double-check the information before pressing the button</span>-->
<<<<<<< Updated upstream
                            <button class="btn btn-primary" type="submit" id="sbmt_btn" disabled><i class="fa-solid fa-square-plus icon-white"></i> Create</button>
=======
                            <button class="btn btn-secondary" type="submit" id="sbmt_btn" disabled><i class="fa-solid fa-square-plus icon-white"></i> Create</button>
>>>>>>> Stashed changes
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
$(document).ready(function() {
    let subject = $('#school_yearDD');
    console.log(subject);
    $.ajax({
        method: "POST",
        headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                Accept: "application/json"
        },
        url: "{{ route('get_all_schoolyear') }}",
        success: function(data) {
            console.log(data);
            data.forEach(element => {
                subject.append(`<option value="${element.id}">AY ${element.start}-${element.end}</option>`);
            });
        }
    });
});
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
        selectedDays = JSON.stringify(selectedDays);
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
//instructor id vibes
$('#instruct_rfid').on('keypress click', function() {
    $.ajax({
      method: "POST",
      headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            Accept: "application/json"
      },
      url: "{{ route('check_instruct_rfid') }}",
      data: { input_data: $(this).val() },
      success: function(data) {
        console.log(data);
        if (data) {
          $('#subjectRFIDError.is-invalid').css('visibility','visible');
          $('#subjectRFIDError.is-invalid').html('<strong>Instructor does not Exist</strong>');
          $('#sbmt_btn').prop('disabled', true);
        }
        else
        {
            $('#subjectRFIDError.is-invalid').css('visibility','hidden');
        }
      }
    });
});

$('#MondayCheck,#TuesdayCheck,#WednesdayCheck,#ThursdayCheck,#FridayCheck,#sub_id,#sub_name,#as_room,#instruct_rfid').on('keypress keyup keydown click', function () {
  if ( $('#sub_id').val().match('^[0-9]{5}$') && $('#sub_id').val().length === 5 && $('#sub_id').val() != "" && $('#sub_name').val() != "" && $('#as_room').val() != "" && ($('#MondayCheck').is(':checked') || $('#TuesdayCheck').is(':checked') || $('#WednesdayCheck').is(':checked') || $('#ThursdayCheck').is(':checked') || $('#FridayCheck').is(':checked')))  {
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
/*
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
*/
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
