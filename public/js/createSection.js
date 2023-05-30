// window.addEventListener('load', function() {
//     document.getElementById("submit_new_section").style.visibility = "hidden";
//     let createUserForm = document.getElementById('registerForm');
//     ['input','change'].forEach(evt =>
//         createUserForm.querySelectorAll(".form-control, .form-check-input").forEach(input => {
//             input.addEventListener(evt, () => {
//                 $("#" + input.getAttribute("name") + "Error").children("span").text("");
//                 if (input.type != "radio"){
//                     if (input.checkValidity()) {
//                         input.classList.remove('is-invalid');
//                         input.classList.add('is-valid');
//                     } else {
//                         input.classList.remove('is-valid');
//                         input.classList.add('is-invalid');
//                         showCreateUserClientError(input);
//                     }
//                 }

//                 var form_children = $("#registerForm").children();
//                 var student_selected = form_children.find("#studentCheck").is(":checked");
//                 var radios_selected = form_children.find($('input[type="radio"]:checked'));
//                 var form_control = form_children.find('.form-control')
//                 var valid_form_control = form_children.find('.form-control.is-valid')

//                 if (student_selected){
//                     document.getElementById("ifStudent").style.display = "block";
//                     var is_valid = form_control.length === valid_form_control.length && radios_selected.length == 2;
//                 } else {
//                     document.getElementById("ifStudent").style.display = "none";
//                     $('#rfid_numberInput').val("");
//                     $('#rfid_numberInput').removeClass("is-invalid is-valid");
//                     var is_valid = (form_control.length - 1) === valid_form_control.length && radios_selected.length == 2;
//                 }

//                 if (is_valid){
//                     document.getElementById("submit_new_section").style.visibility = "visible";
//                 } else {
//                     document.getElementById("submit_new_section").style.visibility = "hidden";
//                 }
//             })
//         })
//     );
// });

function add_student_to_row(){
    var user = JSON.parse(document.querySelector('#section_student_id_input').value);

    // Create a new row in the table.
    const newRow = document.createElement('tr');

    console.log(user);
    console.log(typeof(user));

    newRow.innerHTML = `
        <td name="student_row">${user.id}</td>
        <td>${user.first_name}</td>
        <td>${user.last_name}</td>
        <td><button type='button' name="delete_button" style="border:0px;"><i class="fa-solid fa-xmark"></i></button></td>
    `;

    // Add the new row to the table.
    document.querySelector('#list tbody').appendChild(newRow);

    remove_from_dropdown(user.id);
    $('#section_student_id_input').val('');

    // Return false so that the default action of the button is not executed.
    return false;
}

function remove_from_dropdown(id){
    document.getElementById(id).style.display = "none";
}

$(document).on('click', '[name="delete_button"]', function(){
    $(this).closest('tr').remove();
    const tableRows = document.querySelectorAll('#student_list tr').length;
    document.getElementById("total_students").textContent = tableRows;
    var student_id = $(this).closest('tr').find('[name="student_row"]').text();
    document.getElementById(student_id).style.display = "block";
});
