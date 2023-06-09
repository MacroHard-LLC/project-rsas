function updateModal(subject, schedules){
    $("#originalID").val(subject.id);
    $('#Usubject_id_input').val(subject.id);
    $('#Usubject_name_input').val(subject.name);
    $('#Usubject_grade_level_input').val(subject.grade_level);
    $('#Usubject_schoolyear_id_input').val(subject.schoolyear_id);
    $('#Usubject_semester_input').val(subject.semester);
    $('#Usubject_machine_id_input').val(subject.machine_id);
    $('#Usubject_instructor_rfid_input').val(subject.instructor_rfid);

    // Clear all existing checkboxes and time inputs
    $('#updateSubjectModal input[type="checkbox"]').prop('checked', false);
    $('#updateSubjectModal input[type="time"]').prop('disabled', true);
    $('#updateSubjectModal .time-input').val('');

    // Loop through the schedules and set the corresponding inputs
    schedules.forEach(function(schedule) {
        // Check the checkbox for the corresponding day
        $('#' + schedule.day + 'CheckU').prop('checked', true);

        // Set the time start and time end inputs for the corresponding day
        $('#updateSubjectModal input[name="' + schedule.day + '_time_st"]').prop('disabled', false);
        $('#updateSubjectModal input[name="' + schedule.day + '_time_st"]').val(schedule.time_start);
        $('#updateSubjectModal input[name="' + schedule.day + '_time_end"]').prop('disabled', false);
        $('#updateSubjectModal input[name="' + schedule.day + '_time_end"]').val(schedule.time_end);
    });

    $('#updateSubjectModal').modal('show');
};

function deleteModal(subject){
    $("#id").val(subject.id);
    $("#deleteModal").children().find("#displayId").children("span").text(subject.id);
    $("#deleteModal").children().find("#displayName").children("span").text(subject.name);
    $("#deleteModal").children().find("#displayGradeLevel").children("span").text(subject.grade_level);
    $('#deleteModal').modal('show');
}
