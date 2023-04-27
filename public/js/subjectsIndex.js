function deleteModal(subject){
    $("#id").val(subject.id);
    $("#deleteModal").children().find("#displayId").children("span").text(subject.id);
    $("#deleteModal").children().find("#displayName").children("span").text(subject.name);
    $("#deleteModal").children().find("#displayGradeLevel").children("span").text(subject.grade_level);
    $('#deleteModal').modal('show');
}
