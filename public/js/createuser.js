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
    // document.getElementById("submission").style.visibility = "hidden";
    $(".is-invalid").children("span").hide();
    // document.getElementByClassName("invalid-feedback").style.visibility = "hidden";
    let currForm1 = document.getElementById('registerForm');
    ['input','change'].forEach(evt =>
        currForm1.querySelectorAll(".form-control, .form-check-input").forEach(input => {
            input.addEventListener(evt, () => {
                $("#" + input.getAttribute("name") + "Error").children("strong").text("");
                if (input.type != "radio"){
                    if (input.checkValidity()) {
                        input.classList.remove('is-invalid');
                        $("#" + input.getAttribute("name") + "Error").children("span").hide();
                        input.classList.add('is-valid');
                    } else {
                        // document.getElementById("client-text").style.display = "block";
                        showClientError(input);
                        input.classList.remove('is-valid');
                        input.classList.add('is-invalid');
                        $("#" + input.getAttribute("name") + "Error").children("span").show();
                    }
                }
                var radios_selected = ($('input[type="radio"]:checked').length > 1);
                var is_valid = $('.form-control').length === $('.form-control.is-valid').length && radios_selected;
                // if (is_valid){
                //     document.getElementById("submission").style.visibility = "visible";
                // } else {
                //     document.getElementById("submission").style.visibility = "hidden";
                // }
            })
        })
    );
});

function showClientError(input){
    var input_name = input.getAttribute("name");
    console.log(input_name);
    if (input_name == "id"){
        if (input.validity.patternMismatch){
            $("#" + input.getAttribute("name") + "Error").children("span").text("User ID must be an integer.");
        } else if (input.validity.tooShort){
            $("#" + input.getAttribute("name") + "Error").children("span").text("User ID must be 9 digits.");
        }
    } else if (input_name == "password"){
        if (input.validity.tooShort){
            $("#" + input.getAttribute("name") + "Error").children("span").text("Please enter a password.");
        }
    } else if (input_name == "first" || input_name == "middle" || input_name == "last"){
        if (input.validity.patternMismatch){
        input_name = input_name.charAt(0).toUpperCase() + input_name.slice(1);
            $("#" + input.getAttribute("name") + "Error").children("span").text(input_name + " name must only be alphabetic characters.");
        } else if (input.validity.tooShort){
            $("#" + input.getAttribute("name") + "Error").children("span").text("Please enter a " + input_name + " name.");
        }
    }
}
