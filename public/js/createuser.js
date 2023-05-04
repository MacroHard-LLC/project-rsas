
const studentCheck = document.querySelector('#studentCheck');
studentCheck.addEventListener("click", userCheck);

function userCheck() {
   if (document.getElementById("studentCheck").checked) {
     var container = document.getElementById("ifStudent")
     container.style.display = "block";
    }

//     // Clear input values
//     var inputs = container.getElementsByTagName('input');
//         for (var index = 0; index < inputs.length; ++index) {
//             if(inputs[index].type =="text")
//             inputs[index].value = '';
//             else
//             inputs[index].checked = false;
//         }*/

 //   if (document.getElementById("studentCheck").checked) {
 //       document.getElementById("student_or_adviser").style.display = "block";
        //document.getElementById("rfid").style.display = "block";

 //  } 
    else {
        document.getElementById("ifStudent").style.display = "none";
        document.getElementById("rfid_numberInput").value = '';
   }
 }


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
                        showCreateUserClientError(input);
                    }
                }
                
                var form_children = $("#registerForm").children();
                var student_selected = form_children.find("#rfid_numberInput").is(":checked");
                var radios_selected = $("#registerForm").children().find($('input[type="radio"]:checked'));
                var form_control = $("#registerForm").children().find('.form-control')
                var valid_form_control = $("#registerForm").children().find('.form-control.is-valid')
                if (student_selected == 1){
                    var is_valid = form_control.length === valid_form_control.length && radios_selected.length > 1;
                } else{
                    $('#rfid_numberInput').val("");
                    var is_valid = (form_control.length - 1) === valid_form_control.length && radios_selected.length > 1;
                }


                if (is_valid){
                    document.getElementById("submission").style.visibility = "visible";
                } else {
                    document.getElementById("submission").style.visibility = "hidden";
                }
            })
        })
    );
});

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
