const editSubjectModal = document.getElementById('updateSubjectModal')
editSubjectModal.addEventListener('show.bs.modal', function() {
    let updateForm = document.getElementById('updateSubjectForm');

    $("#updateSubjectForm input").removeClass("is-valid is-invalid");
    updateForm.querySelectorAll(".form-control, .form-select").forEach(input => {
        $("#" + input.getAttribute("name") + "_error").children("span").text("");
    });

    ['input','change'].forEach(evt =>
        updateSubjectForm.querySelectorAll(".form-control, .form-select, .form-check-input").forEach(input => {
            input.addEventListener(evt, () => {
                $("#" + input.getAttribute("name") + "_error").children("span").text("");

                if(input.type == "checkbox"){
                    var isChecked = $(input).prop('checked');
                    var $timeInputs = $(input).closest('.row').find('.time-input');
                    if (isChecked){
                        $("#Usubject_days_error").children("span").text("");
                        $timeInputs.prop('disabled', false);
                    } else if (!isChecked && $("input[type='checkbox']:checked").length < 1){
                        $("#Usubject_days_error").children("span").text("Please check at least one of the days.");
                        $timeInputs.prop('disabled', true).val('');
                    } else
                        $timeInputs.prop('disabled', true).val('');
                }

                if (input.checkValidity() && input.type != 'checkbox' && input.type != 'time') {
                    input.classList.remove('is-invalid');
                    input.classList.add('is-valid');
                } else if (!input.checkValidity() && input.type != 'checkbox' && input.type != 'time') {
                    input.classList.remove('is-valid');
                    input.classList.add('is-invalid');
                    showUpdateSubjectClientError(input);
                }
                checkOverallValidity();
            })
        })
    );
});

function checkOverallValidity() {
    var formChildren = $("#updateSubjectForm").children();
    var invalidFields = formChildren.find('.form-control.is-invalid, .form-select.is-invalid');
    var checkedCheckboxes = $("input[type='checkbox']:checked");
    var timeInputs = checkedCheckboxes.closest('.row').find('.time-input');
    var isTimeInputsFilled = timeInputs.toArray().every(input => input.value.trim() !== '');

    var isInvalid = invalidFields.length > 0 || checkedCheckboxes.length < 1 || !isTimeInputsFilled;
    if (isInvalid)
        document.getElementById("submitUpdatedSubject").style.visibility = "hidden";
    else
        document.getElementById("submitUpdatedSubject").style.visibility = "visible";
}

function showUpdateSubjectClientError(input){
    var input_name = input.getAttribute("name");
    if (input_name == "subject_id"){
        if (input.validity.patternMismatch){
            $("#" + input.getAttribute("name") + "_error").children("span").text("Subject ID must only be digits.");
        } else if (input.validity.tooShort){
            $("#" + input.getAttribute("name") + "_error").children("span").text("Subject ID must be 5 digits.");
        }
    } else if (input_name = "subject_name" && input.validity.patternMismatch){
        $("#" + input.getAttribute("name") + "_error").children("span").text("Subject name must not contain special characters.");
    }
}
