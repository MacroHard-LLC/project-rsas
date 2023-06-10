window.addEventListener('load', function() {
    document.getElementById("submit_instructor").style.visibility = "hidden";
    let addInstructorForm = document.getElementById('registerInstForm');
    ['input','change'].forEach(evt =>
        addInstructorForm.querySelectorAll(".form-control").forEach(input => {
            input.addEventListener(evt, () => {
                $("#" + input.getAttribute("name") + "_error").children("span").text("");

                if (input.checkValidity()) {
                    input.classList.remove('is-invalid');
                    input.classList.add('is-valid');
                } else {
                    input.classList.remove('is-valid');
                    input.classList.add('is-invalid');
                    showAddInstructorError(input);
                }

                var form_children = $("#registerInstForm").children();
                var form_control = form_children.find('.form-control')
                var valid_form_control = form_children.find('.form-control.is-valid')
                var is_valid = form_control.length === valid_form_control.length;
                if (is_valid)
                    document.getElementById("submit_instructor").style.visibility = "visible";
                else
                    document.getElementById("submit_instructor").style.visibility = "hidden";
            })
        })
    );
});

function showAddInstructorError(input){
    var input_name = input.getAttribute("name");
    if (input_name == "instructor_rfid_number"){
        if (input.validity.patternMismatch)
            $("#" + input.getAttribute("name") + "_error").children("span").text("RFID number must be an integer.");
        else if (input.validity.tooShort)
            $("#" + input.getAttribute("name") + "_error").children("span").text("RFID number must be 10 digits.");
    } else if (input_name == "instructor_first_name" || input_name == "instructor_middle_name" || input_name == "instructor_last_name"){
        if (input.validity.patternMismatch)
            $("#" + input.getAttribute("name") + "_error").children("span").text("Name must only be alphabetic characters.");
    }
}
