const createSchoolyearModal = document.getElementById('schoolyearModal')
createSchoolyearModal.addEventListener('shown.bs.modal', function() {
    checkOverallCreateSchoolyearValidity();
    let createSchoolyearForm = document.getElementById('registerSYForm');

    ['input','change'].forEach(evt =>
        createSchoolyearForm.querySelectorAll(".form-control").forEach(input => {
            input.addEventListener(evt, createSchoolyearInputListener(input));
        })
    );
});

const createSchoolyearInputListener = (input) => {
    return () => {
        $("#" + input.getAttribute("name") + "_error").children("span").text("");

        if (input.checkValidity()) {
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
        } else {
            input.classList.remove('is-valid');
            input.classList.add('is-invalid');
            showSchoolyearError(input);
        }

        checkOverallCreateSchoolyearValidity();
    };
};

function checkOverallCreateSchoolyearValidity(){
    var form_children = $("#registerSYForm").children();
    var form_control = form_children.find('.form-control')
    var valid_form_control = form_children.find('.form-control.is-valid')
    var is_valid = form_control.length === valid_form_control.length;
    if (is_valid)
        document.getElementById("submit_schoolyear").style.visibility = "visible";
    else
        document.getElementById("submit_schoolyear").style.visibility = "hidden";
}

createSchoolyearModal.addEventListener('hidden.bs.modal', function(){
    // Remove event listeners
    const inputElements = createSchoolyearModal.querySelectorAll('.form-control');
    inputElements.forEach(input => {
        input.removeEventListener('input', createSchoolyearInputListener);
        input.removeEventListener('change', createSchoolyearInputListener);
    });
});

function showSchoolyearError(input){
    if (input.validity.tooShort)
        $("#" + input.getAttribute("name") + "_error").children("span").text("Year must be 4 digits.");
    else if (input.validity.patternMismatch)
        $("#" + input.getAttribute("name") + "_error").children("span").text("Year must be between 1900 - 2099.");
}
