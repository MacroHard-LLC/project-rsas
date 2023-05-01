function updateModal(user){
    $('#idInputU').val(user.id);
    $('#passwordInputU').val(user.password);

    if (user.role == "admin")
        $("#adminCheckU").prop("checked", true);
    else if (user.role == "student")
        $("#studentCheckU").prop("checked", true);
    else
        $("#adviserCheckU").prop("checked", true);

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

function deleteModal(user){
    $("#id").val(user.id);
    // $("#deleteModal").children().find("#displayId").children("span").text(user.id);
    // $("#deleteModal").children().find("#displayFirstName").children("span").text(user.first_name);
    // $("#deleteModal").children().find("#displayLastName").children("span").text(user.last_name);
    $('#deleteModal').modal('show');
}
