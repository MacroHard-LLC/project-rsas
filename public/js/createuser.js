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
    let currForm1 = document.getElementById('registerForm');
    // Validate on input:
    currForm1.querySelectorAll('.form-control').forEach(input => {
    input.addEventListener(('input'), () => {
        $("#" + input.getAttribute("name") + "Error").children("strong").text("");
        if (input.checkValidity()) {
            input.classList.remove('is-invalid')
            input.classList.add('is-valid');
        } else {
            document.getElementById("client-text").style.display = "block";
            input.classList.remove('is-valid');
            input.classList.add('is-invalid');
        }
        var is_valid = $('.form-control').length === $('.form-control.is-valid').length;
        $("#submitBtn").attr("disabled", !is_valid);
    });
  });
});
