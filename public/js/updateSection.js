const editSectionModal = document.getElementById('updateSectionModal')
editSectionModal.addEventListener('show.bs.modal', function() {
    let updateForm = document.getElementById('updateSectionForm');

    $("#updateSectionForm input").removeClass("is-valid is-invalid");
    updateForm.querySelectorAll(".form-control, .form-select").forEach(input => {
        $("#section_" + input.getAttribute("name") + "_error").children("span").text("");
    });

    document.getElementById("submit_new_section").style.visibility = "visible";

    ['input','change'].forEach(evt =>
        updateForm.querySelectorAll(".form-control, .form-select").forEach(input => {
            input.addEventListener(evt, () => {
                $("#section_" + input.getAttribute("name") + "_error").children("span").text("");

                if (input.getAttribute('id') == 'section_student_id_input' && $('#' + input.getAttribute('id')).val() != '')
                    document.getElementById('add_student_btn').disabled = false;

                if (input.checkValidity()) {
                    input.classList.remove('is-invalid');
                    if (input.getAttribute('id') != 'section_student_id_input')
                        input.classList.add('is-valid');
                } else {
                    input.classList.remove('is-valid');
                    input.classList.add('is-invalid');
                    showUpdateSectionClientError(input);
                }
                checkOverallValidity();
            })
        })
    );
});

function checkOverallValidity(){
    var form_children = $("#updateSectionForm").children();
    var invalid_fields = form_children.find('.form-control.is-invalid, .form-select.is-invalid')
    var student_rows = $("#student_list").children();
    var is_invalid = invalid_fields.length > 0 || student_rows.length <= 0;
    if (is_invalid)
        document.getElementById("submit_new_section").style.visibility = "hidden";
    else
        document.getElementById("submit_new_section").style.visibility = "visible";
}

function showUpdateSectionClientError(input){
    var input_name = input.getAttribute("name");
    if (input_name = "section_name" && input.validity.tooLong)
        $("#section_" + input.getAttribute("name") + "_error").children("span").text("Section name must have a maximum of 50 characters.");
    else if (input_name = 'section_grade_level' ||  input_name == 'section_adviser_id' && input.validity.valueMissing){
        input_name = input_name.charAt(0).toUpperCase() + input_name.slice(1);
        input_name = input_name.split("_", 1);
        $("#section_" + input.getAttribute("name") + "_error").children("span").text(input_name + " is required.");
    }
}

function add_student_to_row(){
    var user = JSON.parse(document.querySelector('#section_student_id_input').value);

    // Create a new row in the table.
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td name="new_student_id">${user.id}</td>
        <td>${user.first_name}</td>
        <td>${user.last_name}</td>
        <td class='delete'><button type='button' name="delete_button" style="border:0px; background-color: transparent;"><i class="fa-solid fa-xmark"></i></button></td>
    `;

    // Add the new row to the table.
    document.querySelector('#list tbody').appendChild(newRow);

    remove_from_dropdown(user.id);
    $('#section_student_id_input').val('');

    const tableRows = document.querySelectorAll('#student_list tr').length;
    document.getElementById("total_students").textContent = tableRows;

    document.getElementById('add_student_btn').disabled = true;
    checkOverallValidity();

    // Return false so that the default action of the button is not executed.
    return false;
}

function add_student_to_dropdown(id, first_name, last_name){
    const student = '{"id":'+ id +', "first_name":"'+ first_name
        +'", "last_name":"'+ last_name +'"}';
    $('#section_student_id_input').append(`<option value='${student}' id='${id}'>${first_name}, ${last_name}</option>`);
}

function remove_from_dropdown(id){
    document.getElementById(id).style.display = "none";
}

$(document).on('click', '[name="delete_button"]', function(){
    $(this).closest('tr').remove();

    const tableRows = document.querySelectorAll('#student_list tr').length;
    document.getElementById("total_students").textContent = tableRows;

    var enrolled_student = $(this).closest('tr').attr('name') == 'enrolled';
    if (enrolled_student){
        var id = $(this).closest('tr').find('[name="student_id"]').text();
        var first_name = $(this).closest('tr').find('[name="first_name"]').text();
        var last_name = $(this).closest('tr').find('[name="last_name"]').text();
        add_student_to_dropdown(id,first_name,last_name)
    } else {
        var student_id = $(this).closest('tr').find('[name="new_student_id"]').text();
        document.getElementById(student_id).style.display = "block";
    }

    checkOverallValidity();
});
