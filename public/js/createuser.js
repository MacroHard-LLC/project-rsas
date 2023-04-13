// const studentCheck = document.querySelector('#studentCheck');
// const adviserCheck = document.querySelector('#adviserCheck');
// const adminCheck = document.querySelector('#adminCheck');

// studentCheck.addEventListener('change', userCheck);
// adviserCheck.addEventListener('change', userCheck);
// adminCheck.addEventListener('change', userCheck);

// function userCheck() {
//   if (document.getElementById("adminCheck").checked) {
//     var container = document.getElementById("student_or_adviser")
//     container.style.display = "block";

//     // Clear input values
//     /*var inputs = container.getElementsByTagName('input');
//         for (var index = 0; index < inputs.length; ++index) {
//             if(inputs[index].type =="text")
//             inputs[index].value = '';
//             else
//             inputs[index].checked = false;
//         }*/

//   } else if (document.getElementById("studentCheck").checked) {
//     document.getElementById("student_or_adviser").style.display = "block";
//     // document.getElementById("rfid").style.display = "block";

//   } else {
//     document.getElementById("student_or_adviser").style.display = "block";
//     // document.getElementById("rfid").style.display = "none";
//     // document.getElementById("rfid_value").value = '';
//   }
// }

window.addEventListener('load', function() {
    document.getElementById("submission").style.visibility = "hidden";
    let createUserForm = document.getElementById('registerForm');
    ['input','change'].forEach(evt =>
        createUserForm.querySelectorAll(".form-control, .form-check-input").forEach(input => {
            input.addEventListener(evt, () => {
                $("#" + input.getAttribute("name") + "Error").children("span").text("");
                if (input.type != "radio"){
                    if (input.checkValidity()) {
                        input.classList.remove('is-invalid');
                        input.classList.add('is-valid');
                    } else {
                        input.classList.remove('is-valid');
                        input.classList.add('is-invalid');
                        showClientError(input);
                    }
                }
                var radios_selected = ($('input[type="radio"]:checked').length > 1);
                var form_control = $("#registerForm").children().find('.form-control')
                var valid_form_control = $("#registerForm").children().find('.form-control.is-valid')
                var is_valid = form_control.length === valid_form_control.length && radios_selected;
                if (is_valid){
                    document.getElementById("submission").style.visibility = "visible";
                } else {
                    document.getElementById("submission").style.visibility = "hidden";
                }
            })
        })
    );
});

function showClientError(input){
    var input_name = input.getAttribute("name");
    if (input_name == "id"){
        if (input.validity.patternMismatch){
            $("#" + input.getAttribute("name") + "Error").children("span").text("User ID must be an integer.");
        } else if (input.validity.tooShort){
            $("#" + input.getAttribute("name") + "Error").children("span").text("User ID must be 9 digits.");
        }
    } else if (input_name == "first" || input_name == "middle" || input_name == "last"){
        if (input.validity.patternMismatch){
            input_name = input_name.charAt(0).toUpperCase() + input_name.slice(1);
            $("#" + input.getAttribute("name") + "Error").children("span").text(input_name + " name must only be alphabetic characters.");
        }
    }
}
