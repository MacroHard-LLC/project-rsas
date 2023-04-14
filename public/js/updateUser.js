const editUserModal = document.getElementById('updateUserModal')
editUserModal.addEventListener('shown.bs.modal', function() {
    let updateForm = document.getElementById('updateUserForm');
    ['input','change'].forEach(evt =>
        updateForm.querySelectorAll(".form-control, .form-check-input").forEach(input => {
            input.addEventListener(evt, () => {
                $("#" + input.getAttribute("name") + "ErrorU").children("span").text("");
                if (input.type != "radio"){
                    if (input.checkValidity()) {
                        input.classList.remove('is-invalid');
                        input.classList.add('is-valid');
                    } else {
                        input.classList.remove('is-valid');
                        input.classList.add('is-invalid');
                        showUpdateUserClientError(input);
                    }
                }
                var radios_selected = ($('input[type="radio"]:checked').length > 1);
                var invalid_form_control = $("#updateUserForm").children().find('.form-control.is-invalid')
                var is_invalid = invalid_form_control.length > 0 || !radios_selected;
                if (is_invalid){
                    document.getElementById("submissionU").style.visibility = "hidden";
                } else {
                    document.getElementById("submissionU").style.visibility = "visible";
                }
            })
        })
    );
});

function showUpdateUserClientError(input){
    var input_name = input.getAttribute("name");
    if (input_name == "id"){
        if (input.validity.patternMismatch){
            $("#" + input.getAttribute("name") + "ErrorU").children("span").text("User ID must be an integer.");
        } else if (input.validity.tooShort){
            $("#" + input.getAttribute("name") + "ErrorU").children("span").text("User ID must be 9 digits.");
        }
    } else if (input_name == "first" || input_name == "middle" || input_name == "last"){
        if (input.validity.patternMismatch){
            input_name = input_name.charAt(0).toUpperCase() + input_name.slice(1);
            $("#" + input.getAttribute("name") + "ErrorU").children("span").text(input_name + " name must only be alphabetic characters.");
        }
    }
}
