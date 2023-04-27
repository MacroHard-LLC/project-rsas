function updateModal(user){
    $('#idInputU').val(user.id);
    $('#passwordInputU').val(user.password);

    if (user.role == "0")
        $("#adminCheckU").prop("checked", true);
    else if (user.role == "1")
        $("#studentCheckU").prop("checked", true);
    else
        $("#adviserCheckU").prop("checked", true);

    $('#firstInputU').val(user.first);
    $('#middleInputU').val(user.middle);
    $('#lastInputU').val(user.last);

    if (user.gender == "M")
        $("#maleInputU").prop("checked", true);
    else
        $("#femaleInputU").prop("checked", true);

    $("#originalID").val(user.id);


    $('#updateUserModal').modal('show');
};

function deleteModal(user){
    $("#id").val(user.id);
    $("#deleteModal").children().find("#displayId").children("span").text(user.id);
    $("#deleteModal").children().find("#displayFirstName").children("span").text(user.first);
    $("#deleteModal").children().find("#displayLastName").children("span").text(user.last);
    $('#deleteModal').modal('show');
}
