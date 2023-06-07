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
                                <input type="text" class="form-control form-control-sm" placeholder="Input a 5-digit integer" name="subject_id" id="subject_id_input" minlength="5" maxlength="5" required autofocus>
                                <div class="is-invalid" id="subject_id_error">
                                    <span></span>
                                </div>
                            </div>

                            <div class="col-md-6 input-field">
                                <label for="subject_name_input" class="input-title">Subject Name</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Ex. Introduction to Computer Science" name="subject_name" id="subject_name_input" minlength="1" maxlength="50" aria-describedby="nameError" required>
                                <div class="is-invalid" id="subject_name_error">
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 col-md-4 input-field">
                                <label for="subject_grade_level_input" class="input-title">Grade Level</label>
                                <select name="subject_grade_level" class="form-select" id="subject_grade_level_input" required>
                                    <option value="" disabled selected="selected" class="form-message">Choose a Grade Level</option>
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
                                    <option value="" disabled selected="selected">Select a School Year</option>
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
                                    <label for="subject_room_input" class="input-title">Assigned Room</label>
                                    <input type="text" name="subject_room" class="form-control form-control-sm" placeholder="Ex. RM 143, Arts and Sciences Building" id="subject_room_input" maxlength="20" required>
                                    <div class="is-invalid" id="subject_room_error">
                                        <span></span>
                                    </div>
                                </div>

                            <div class="col-md-6 input-field">
                                    <label for="instruct_rfid" class="input-title">Instructor RFID</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Enter a N-M digit integer" name="instruct_rfid" pattern="[0-9]+" id='instruct_rfid' required>
                                    <div class="is-invalid" id="subject_room_error">
                                        <span></span>
                                    </div>

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
                            <button class="btn btn-primary" type="submit" id="submitNewSubject" disabled><i class="fa-solid fa-square-plus icon-white"></i> Create</button>
                        </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
