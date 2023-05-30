function updateModal(user, student){
    $('#idInputU').val(user.id);
    $('#passwordInputU').val(user.password);

    if (user.role == "admin"){
        $("#adminCheckU").prop("checked", true);
        $("#rfid_numberInputU").val('');
    }
    else if (user.role == "student"){
        $("#studentCheckU").prop("checked", true);
        $("#rfid_numberInputU").val(student.rfid_number);
    }
    else{
        $("#adviserCheckU").prop("checked", true);
        $("#rfid_numberInputU").val('');
    }


    $('#first_nameInputU').val(user.first_name);
    $('#middle_nameInputU').val(user.middle_name);
    $('#last_nameInputU').val(user.last_name);

    if (user.sex == "M")
        $("#maleInputU").prop("checked", true);
    else
        $("#femaleInputU").prop("checked", true);

    $("#originalID").val(user.id);


    $('#updateUserModal').modal('show');
};

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

    // Return false so that the default action of the button is not executed.
    return false;
}

function remove_from_dropdown(id){
    $('#' + id).remove();
}

$(document).on('click', '[name="delete_button"]', function(){
    $(this).closest('tr').remove();
    const tableRows = document.querySelectorAll('#student_list tr').length;
    document.getElementById("total_students").textContent = tableRows;
});
