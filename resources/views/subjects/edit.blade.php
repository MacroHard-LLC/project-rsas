<div class="modal fade" id="updateSubjectModal" tabindex="-1" role="dialog" aria-labelledby="updateSubjectModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class='modal-content'>
            <div class='modal-header'>
                <h1 class="modal-title fs-5" id="registerModalLabel"><i class="fa-solid fa-circle"></i> EDIT SUBJECT</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="POST" id="updateSubjectForm" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <fieldset>
                        <div class="row">
                            <div class="col-md-6 input-field">
                                <label for="Usubject_id_input" class="input-title" >Subject ID</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Input a 5-digit integer" name="Usubject_id" id="Usubject_id_input" pattern="[0-9]+" minlength="5" maxlength="5" required autofocus>
                                <div class="is-invalid" id="Usubject_id_error">
                                    <span></span>
                                </div>
                            </div>

                            <div class="col-md-6 input-field">
                                <label for="Usubject_name_input" class="input-title">Subject Name</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Ex. Introduction to Computer Science" name="Usubject_name" id="Usubject_name_input" pattern="^[0-9a-zA-Z_ ,.]{0,50}$" minlength="1" maxlength="50" aria-describedby="nameError" required>
                                <div class="is-invalid" id="Usubject_name_error">
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 col-md-4 input-field">
                                <label for="Usubject_grade_level_input" class="input-title">Grade Level</label>
                                <select name="Usubject_grade_level" class="form-select" id="Usubject_grade_level_input" required>
                                    <option value="" disabled selected="selected" class="form-message">Select a Gr. Lvl</option>
                                    @for ($i = 7; $i < 11; $i++)
                                        <option value={{$i}}>Level {{$i}}</option>
                                    @endfor
                                </select>
                                <div class="is-invalid" id="Usubject_grade_level_error">
                                    <span></span>
                                </div>
                            </div>

                            <div class="col-6 col-md-4 input-field">
                                <label for="Usubject_schoolyear_id_input" class="input-title">School Year</label>
                                <select name="Usubject_schoolyear_id" class="form-select" id="Usubject_schoolyear_id_input" required>
                                    <option value="" disabled selected="selected">Select a SY</option>
                                    @foreach ($schoolyears as $schoolyear)
                                        <option value="{{ $schoolyear->id }}">{{ $schoolyear->start_year }} - {{ $schoolyear->end_year }}</option>
                                    @endforeach
                                </select>
                                <div class="is-invalid" id="Usubject_schoolyear_id_error">
                                    <span></span>
                                </div>
                            </div>

                            <div class="col-6 col-md-4 input-field">
                                    <label for="Usubject_semester_input" class="input-title">Semester</label>
                                    <select name="Usubject_semester" class="form-select" id="Usubject_semester_input" required>
                                        <option value="1">First Semester</option>
                                        <option value="2">Second Semester</option>
                                    </select>
                                    <div class="is-invalid" id="Usubject_semester_error">
                                        <span></span>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 input-field">
                                <label for="Usubject_machine_id_input" class="input-title">Assigned Room</label>
                                <select name="Usubject_machine_id" class="form-select" id="Usubject_machine_id_input" required>
                                <option value="" disabled selected="selected">Select a Room</option>
                                @foreach ($machines as $machine)
                                    <option value="{{ $machine->id }}">{{ $machine->room }}</option>
                                @endforeach
                                </select>
                                <div class="is-invalid" id="Usubject_machine_id_error">
                                    <span></span>
                                </div>
                            </div>

                            <div class="col-md-6 input-field">
                                <label for="Usubject_schoolyear_id_input" class="input-title">Instructor</label>
                                <select name="Usubject_instructor_rfid" class="form-select" id="Usubject_instructor_rfid_input" required>
                                    <option value="" disabled selected="selected">Select an Instructor</option>
                                    @foreach ($instructors as $instructor)
                                        <option value="{{ $instructor->rfid_number }}">{{ $instructor->last_name }}, {{ $instructor->first_name }} {{ $instructor->middle_name }}</option>
                                    @endforeach
                                </select>
                                <div class="is-invalid" id="Usubject_instructor_rfid_error">
                                    <span></span>
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

                                @php
                                    $days = [
                                        ['value' => 'MON', 'label' => 'Monday'],
                                        ['value' => 'TUE', 'label' => 'Tuesday'],
                                        ['value' => 'WED', 'label' => 'Wednesday'],
                                        ['value' => 'THU', 'label' => 'Thursday'],
                                        ['value' => 'FRI', 'label' => 'Friday'],
                                    ];
                                @endphp

                                @foreach($days as $day)
                                    <div class="row pb-2">
                                        <div class="col-6 col-md-4">
                                            <div class="form-check pb-2">
                                                <input class="form-check-input day-checkbox" type="checkbox" id="{{ $day['value'] }}CheckU" value="{{ $day['value'] }}">
                                                <label class="form-check-label" for="{{ $day['value'] }}Check">{{ $day['label'] }}</label>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4">
                                            <div class="form-outline input-field">
                                                <input type="time" name="{{ $day['value'] }}_time_st" class="form-control form-control-sm time-input" placeholder="00:00 XM" id="{{ $day['value'] }}_time_st_inputU" disabled>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4">
                                            <div class="form-outline input-field">
                                                <input type="time" class="form-control form-control-sm time-input" placeholder="00:00 XM" name="{{ $day['value'] }}_time_end" id="{{ $day['value'] }}_time_end_inputU" disabled>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="is-invalid" id="daysError">
                                    <span></span>
                                </div>
                            </div>

                        <div class="form-group float-end">
                            <button class="btn btn-primary" type="submit" id="submitUpdatedSubject"><i class="fa-solid fa-floppy-disk fa-lg icon-white"></i> Save</button>
                        </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/updateSubject.js') }}"></script>
<script>
    $(function () {
        $('#updateSubjectForm').submit(function (e) {
            e.preventDefault();

            let formData = $(this).serializeArray();
            jQuery.each(formData, function(i, field ) {
                field.name = field.name.replace("Usubject_", "")
            });

            console.log(formData);

            let selectedDays = [];
            // Iterate over checked checkboxes and add their values to the selectedDays array
            $("input[type='checkbox']:checked").each(function() {
                selectedDays.push($(this).val());
            });
            selectedDays = JSON.stringify(selectedDays);
            formData.push({name: 'days', value: selectedDays});

            $(".is-invalid").children("span").text("");
            $("#updateSubjectForm input").removeClass("is-invalid");

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
                            $("#Usubject_" + key + "_input").addClass("is-invalid");
                            $("#Usubject_" + key + "_error").children("span").text(errors[key][0]);
                            console.log(errors);
                        });
                    }
                }
            })
        });
    })
</script>
