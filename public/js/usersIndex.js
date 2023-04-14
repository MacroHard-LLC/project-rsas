function updateModal(user){
    // console.log(user);

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

    $('#updateUserModal').modal('show');
};
