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
                            <!--<span class="submit-reminder me-3">Double-check the information before pressing the button</span>-->
                            <button class="btn btn-primary" onclick="getData()" type="submit" id="sbmt_btn" disabled><i class="fa-solid fa-square-plus icon-white"></i> Add Machine</button>
                        </div>

                        <?php
                        
                        function getData() {
                            // Get the data from the modal
                            $status = $_POST['status'];
                            $room = $_POST['room'];
                          
                            // Return the data
                            return array(
                              'status' => $status,
                              'room' => $room
                            );
                          }
                        
                        function insertData($data) {
// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=rsas', 'root', 'password');

// Prepare the insert statement
$stmt = $db->prepare('INSERT INTO machine (status, room) VALUES (?, ?)');

// Bind the data to the statement
$stmt->bindParam(1, $data['status']);
$stmt->bindParam(2, $data['room']);

// Execute the statement
$stmt->execute();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Get the data from the modal
$data = getData();

// Insert the data into the database
insertData($data);
}

?>


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
