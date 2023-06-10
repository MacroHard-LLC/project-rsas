<div class="modal fade" id="createSubjectModal" tabindex="-1" role="dialog" aria-labelledby="createSubjectModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class='modal-content'>
            <div class='modal-header'>
                <h1 class="modal-title fs-5" id="registerModalLabel"><i class="fa-solid fa-circle"></i> CREATE NEW SUBJECT</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="POST" id="createSubjectForm" class="needs-validation" novalidate>
                    @csrf
                    <fieldset>
                        <div class="row">
                            <div class="col-md-6 input-field">
                                <label for="subject_id_input" class="input-title" >Subject ID</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Input a 5-digit integer" name="subject_id" id="subject_id_input" pattern="[0-9]+" minlength="5" maxlength="5" required autofocus>
                                <div class="is-invalid" id="subject_id_error">
                                    <span></span>
                                </div>
                            </div>

                            <div class="col-md-6 input-field">
                                <label for="subject_name_input" class="input-title">Subject Name</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Ex. Introduction to Computer Science" name="subject_name" id="subject_name_input" pattern="^[0-9a-zA-Z_ ,.]{0,50}$" minlength="1" maxlength="50" aria-describedby="nameError" required>
                                <div class="is-invalid" id="subject_name_error">
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 col-md-4 input-field">
                                <label for="subject_grade_level_input" class="input-title">Grade Level</label>
                                <select name="subject_grade_level" class="form-select" id="subject_grade_level_input" required>
                                    <option value="" disabled selected="selected" class="form-message">Select a Gr. Lvl</option>
                                    @for ($i = 7; $i < 11; $i++)
                                        <option value={{$i}}>Level {{$i}}</option>
                                    @endfor
                                </select>
                                <div class="is-invalid" id="subject_grade_level_error">
                                    <span></span>
                                </div>
                            </div>

                            <div class="col-6 col-md-4 input-field">
                                <label for="subject_schoolyear_id_input" class="input-title">School Year</label>
                                <select name="subject_schoolyear_id" class="form-select" id="subject_schoolyear_id_input" required>
                                    <option value="" disabled selected="selected">Select a SY</option>
                                    @foreach ($schoolyears as $schoolyear)
                                        <option value="{{ $schoolyear->id }}">{{ $schoolyear->start_year }} - {{ $schoolyear->end_year }}</option>
                                    @endforeach
                                </select>
                                <div class="is-invalid" id="subject_schoolyear_id_error">
                                    <span></span>
                                </div>
                            </div>

                            <div class="col-6 col-md-4 input-field">
                                    <label for="subject_semester_input" class="input-title">Semester</label>
                                    <select name="subject_semester" class="form-select" id="subject_semester_input" required>
                                        <option value="1">First Semester</option>
                                        <option value="2">Second Semester</option>
                                    </select>
                                    <div class="is-invalid" id="subject_semester_error">
                                        <span></span>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 input-field">
                                <label for="subject_machine_id_input" class="input-title">Assigned Room</label>
                                <select name="subject_machine_id" class="form-select" id="subject_machine_id_input" required>
                                <option value="" disabled selected="selected">Select a Room</option>
                                @foreach ($machines as $machine)
                                    <option value="{{ $machine->id }}">{{ $machine->room }}</option>
                                @endforeach
                                </select>
                                <div class="is-invalid" id="subject_machine_id_error">
                                    <span></span>
                                </div>
                            </div>

                            <div class="col-md-6 input-field">
                                <label for="subject_schoolyear_id_input" class="input-title">Instructor</label>
                                <select name="subject_instructor_rfid" class="form-select" id="subject_instructor_rfid_input" required>
                                    <option value="" disabled selected="selected">Select an Instructor</option>
                                    @foreach ($instructors as $instructor)
                                        <option value="{{ $instructor->rfid_number }}">{{ $instructor->last_name }}, {{ $instructor->first_name }} {{ $instructor->middle_name }}</option>
                                    @endforeach
                                </select>
                                <div class="is-invalid" id="subject_instructor_rfid_error">
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
                                                <input class="form-check-input day-checkbox" type="checkbox" id="{{ $day['value'] }}Check" value="{{ $day['value'] }}">
                                                <label class="form-check-label" for="{{ $day['value'] }}Check">{{ $day['label'] }}</label>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4">
                                            <div class="form-outline input-field">
                                                <input type="time" name="{{ $day['value'] }}_time_st" class="form-control form-control-sm time-input" placeholder="00:00 XM" id="{{ $day['value'] }}_time_st_input" disabled>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4">
                                            <div class="form-outline input-field">
                                                <input type="time" class="form-control form-control-sm time-input" placeholder="00:00 XM" name="{{ $day['value'] }}_time_end" id="{{ $day['value'] }}_time_end_input" disabled>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="is-invalid" id="daysError">
                                    <span></span>
                                </div>
                            </div>

                        <div class="form-group float-end" style="visibility:hidden">
                            <button class="btn btn-primary" type="submit" id="submitNewSubject"><i class="fa-solid fa-square-plus icon-white"></i> Create</button>
                        </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/createSubject.js') }}"></script>
<script>
    $(function () {
        $('#createSubjectForm').submit(function (e) {
            e.preventDefault();

            let formData = $(this).serializeArray();
            jQuery.each(formData, function(i, field ) {
                field.name = field.name.replace("subject_", "")
            });

            let selectedDays = [];
            // Iterate over checked checkboxes and add their values to the selectedDays array
            $("input[type='checkbox']:checked").each(function() {
                selectedDays.push($(this).val());
            });
            selectedDays = JSON.stringify(selectedDays);
            formData.push({name: 'days', value: selectedDays});

            $(".is-invalid").children("span").text("");
            $("#createSubjectForm input").removeClass("is-invalid");

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
                            $("#subject_" + key + "_input").addClass("is-invalid");
                            $("#subject_" + key + "_error").children("span").text(errors[key][0]);
                        });
                    }
                }
            })
        });
    })
</script>
