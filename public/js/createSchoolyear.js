window.addEventListener('load', function() {
    document.getElementById("submit_schoolyear").style.visibility = "hidden";
    let createSchoolyearForm = document.getElementById('registerSYForm');
    ['input','change'].forEach(evt =>
        createSchoolyearForm.querySelectorAll(".form-control").forEach(input => {
            input.addEventListener(evt, () => {
                $("#" + input.getAttribute("name") + "_error").children("span").text("");

                if (input.checkValidity()) {
                    input.classList.remove('is-invalid');
                    input.classList.add('is-valid');
                } else {
                    input.classList.remove('is-valid');
                    input.classList.add('is-invalid');
                    showSchoolyearError(input);
                }

                var form_children = $("#registerSYForm").children();
                var form_control = form_children.find('.form-control')
                var valid_form_control = form_children.find('.form-control.is-valid')
                var is_valid = form_control.length === valid_form_control.length;

                if (is_valid)
                    document.getElementById("submit_schoolyear").style.visibility = "visible";
                else
                    document.getElementById("submit_schoolyear").style.visibility = "hidden";
            })
        })
    );
});

function showSchoolyearError(input){
    if (input.validity.tooShort)
        $("#" + input.getAttribute("name") + "_error").children("span").text("Year must be 4 digits.");
    else if (input.validity.patternMismatch)
        $("#" + input.getAttribute("name") + "_error").children("span").text("Year must be between 1900 - 2099.");
}
