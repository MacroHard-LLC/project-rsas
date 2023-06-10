const createUserModal = document.getElementById('registerModal')
createUserModal.addEventListener('shown.bs.modal', function() {
    checkOverallCreateUserValidity();
    let createUserForm = document.getElementById('registerForm');

    ['input','change'].forEach(evt =>
        createUserForm.querySelectorAll(".form-control, .form-check-input").forEach(input => {
            input.addEventListener(evt, createUserInputListener(input));
        })
    );
});

const createUserInputListener = (input) => {
    return () => {
        $("#" + input.getAttribute("name") + "Error").children("span").text("");
        if (input.type != "radio"){
            if (input.checkValidity()) {
                input.classList.remove('is-invalid');
                input.classList.add('is-valid');
            } else {
                input.classList.remove('is-valid');
                input.classList.add('is-invalid');
                showCreateUserClientError(input);
            }
        }

        checkOverallCreateUserValidity();
    };
};

createUserModal.addEventListener('hidden.bs.modal', function(){
    // Remove event listeners
    const inputElements = createUserModal.querySelectorAll('.form-control, .form-check-input');
    inputElements.forEach(input => {
        input.removeEventListener('input', createUserInputListener);
        input.removeEventListener('change', createUserInputListener);
    });
});

function checkOverallCreateUserValidity(){
    var form_children = $("#registerForm").children();
    var student_selected = form_children.find("#studentCheck").is(":checked");
    var radios_selected = form_children.find($('input[type="radio"]:checked'));
    var form_control = form_children.find('.form-control')
    var valid_form_control = form_children.find('.form-control.is-valid')

    if (student_selected){
        document.getElementById("ifStudent").style.display = "block";
        var is_valid = form_control.length === valid_form_control.length && radios_selected.length == 2;
    } else {
        document.getElementById("ifStudent").style.display = "none";
        $('#rfid_numberInput').val("");
        $('#rfid_numberInput').removeClass("is-invalid is-valid");
        var is_valid = (form_control.length - 1) === valid_form_control.length && radios_selected.length == 2;
    }

    if (is_valid)
        document.getElementById("submission").style.visibility = "visible";
    else
        document.getElementById("submission").style.visibility = "hidden";
}

function showCreateUserClientError(input){
    var input_name = input.getAttribute("name");
    if (input_name == "userid"){
        if (input.validity.patternMismatch){
            $("#" + input.getAttribute("name") + "Error").children("span").text("User ID must be an integer.");
        } else if (input.validity.tooShort){
            $("#" + input.getAttribute("name") + "Error").children("span").text("User ID must be 9 digits.");
        }
    } else if (input_name == "first_name" || input_name == "middle_name" || input_name == "last_name"){
        if (input.validity.patternMismatch){
            input_name = input_name.charAt(0).toUpperCase() + input_name.slice(1);
            input_name = input_name.split("_", 1);
            $("#" + input.getAttribute("name") + "Error").children("span").text(input_name + " name must only be alphabetic characters.");
        }
    }
}
