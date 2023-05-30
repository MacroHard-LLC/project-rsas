window.addEventListener('load', function() {
    document.getElementById("submit_new_section").style.visibility = "hidden";
    let createSectionForm = document.getElementById('createSectionForm');
    ['input','change'].forEach(evt =>
        createSectionForm.querySelectorAll(".form-control, .form-select").forEach(input => {
            input.addEventListener(evt, () => {
                $("#section_" + input.getAttribute("name") + "_error").children("span").text("");
                if (input.checkValidity()) {
                    input.classList.remove('is-invalid');
                    if (input.getAttribute('id') != 'section_student_id_input')
                        input.classList.add('is-valid');
                } else {
                    input.classList.remove('is-valid');
                    input.classList.add('is-invalid');
                    showCreateSectionClientError(input);
                }
                checkOverallValidity();
            })
        })
    );
});

function checkOverallValidity(){
    var form_children = $("#createSectionForm").children();
    var fields = form_children.find('.form-control, .form-select')
    var valid_fields = form_children.find('.form-control.is-valid, .form-select.is-valid')
    var student_rows = $("#student_list").children();
    var is_valid = fields.length - 1 === valid_fields.length && student_rows.length > 0;
    if (is_valid)
        document.getElementById("submit_new_section").style.visibility = "visible";
    else
        document.getElementById("submit_new_section").style.visibility = "hidden";
}

function showCreateSectionClientError(input){
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

function add_student_to_row(){
    var user = JSON.parse(document.querySelector('#section_student_id_input').value);

    // Create a new row in the table.
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td name="student_row">${user.id}</td>
        <td>${user.first_name}</td>
        <td>${user.last_name}</td>
        <td class='delete'><button type='button' name="delete_button" style="border:0px;"><i class="fa-solid fa-xmark"></i></button></td>
    `;

    // Add the new row to the table.
    document.querySelector('#list tbody').appendChild(newRow);

    remove_from_dropdown(user.id);
    $('#section_student_id_input').val('');
    checkOverallValidity();

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
    checkOverallValidity();
});
