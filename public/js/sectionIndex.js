function updateModal(section){
    $('#section_name_input').val(section.name);
    $('#section_grade_level_input').val(section.grade_level);
    $('#section_schoolyear_id_input').val(section.schoolyear_id);
    $('#section_adviser_id_input').val(section.adviser_id);
    $('#updateSectionModal').modal('show');
};

function deleteModal(section){
    $("#id").val(section.id);
    $('#deleteModal').modal('show');
}
