<div class="modal fade" id="registerSectionModal" tabindex="-1" role="dialog" aria-labelledby="registerSectionModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class='modal-content'>
            <div class='modal-header'>
                <h1 class="modal-title fs-5" id="registerModalLabel"><i class="fa-solid fa-circle"></i> CREATE GRADE LEVEL</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body mx-5 my-3" id="modalBody">
                <form method="POST" action="/users" id="registerSectionForm" class="needs-validation" novalidate>
                    @csrf
                    <fieldset>
                        <div class="row mb-3">
                            <div class="col-md-6 input-field">
                                <div class="form-outline">
                                    <label for="subj_id" class="input-title">Section ID</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Input a 5 digit integer" name="sectionSubId" id="sectionSubId" pattern="[0-9]+" minlength="5" maxlength="5" required>
                                    <div class="is-invalid" id="idError">
                                        <span id="sectionIDError"></span>
                                    </div>
                                </div>
                            </div>
                                
                            <div class="col-md-6 input-field">
                                <div class="form-outline">
                                    <label for="subj_id" class="input-title">Section Name</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Enter Section Name" name="GradeSectionNameID" id="GradeSectionNameID" required>
                                    <div class="is-invalid" id="idError">
                                        <span id="sectionNameIDError"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                                <div class="col-md-6 input-field"> 
                                    <label for="grade_level" class="input-title">Grade Level</label>   
                                    <select name="grade_level" class="form-select" placeholder="Choose Department ID" id="sectionGradeLevel" required>
                                        <option value="" disabled selected="selected">Choose a Grade Level</option>
                                        <option value="7">Level 7</option>
                                        <option value="8">Level 8</option>
                                        <option value="9">Level 9</option>
                                        <option value="10">Level 10</option>
                                    </select>
                                    <div class="is-invalid" role="alert" id="sectionGradeLevelError" name="gradeError">
                                        <strong></strong>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6 input-field">
                                    <div class="form-outline">
                                        <label for="subj_id" class="input-title">Adviser ID</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Input a 9 digit integer" name="sectionAdviserID" id="sectionAdviserID" minlength="9" maxlength="9" pattern="[0-9]+" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="is-invalid" id="idError">
                                            <span id="sectionAdviserIDError"></span>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="row mb-3">
                                <div class="col-md-5 input-field ">
                                    <div class="form-outline">
                                        <label for="subj_id" class="input-title">Student ID</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Input a 9 digit integer" id="studentSubjectID" name="studentSubjectID" minlength="9" maxlength="9" pattern="[0-9]+" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="is-invalid" role="alert">
                                            <span id="sectionStudIDError"></span>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-md-5 input-field">
                                <div class="form-outline">
                                    <label for="subj_id" class="input-title">Student Name</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Rizal, Jose" id="studentSubjectName" name="studentSubjectName" required>
                                    <div id="myDropdown"></div>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="is-invalid" role="alert">
                                        <span id="sectionStudNameError"></span>
                                    </div>
                                </div>
                                </div>
                            
                                <div class="col-md-2 input-field float-end">
                                    <div class="form-group pt-3">
                                        <button type='button' class="btn btn-primary create" id="addStudent" name="sectionAddStudent" id="sectionAddStudent" onclick="finishVal()"><i class="fa-solid fa-user-plus"></i>Add</button>
                                    </div>
                                </div>


                            <hr style="margin-top: 20px;">

                            <div class="modal-body" id=list>
                                    <table class="table table-striped">
                                    <thead>
                                        <tr>
                                        <th>Student ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th style="width:50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="student_list">
                                    </tbody>
                                    </table>
                            </div>
                        </div>                
                            <hr style="margin-bottom:5px;">
                            <i style="font-size:small;">Total Number of Students: <span id="total_students">0</span></i> <!--dunno how to do counters pud t.t-->

                            <div class="form-group pt-5 float-end" id="submission">
                                <span class="submit-reminder me-3" style="visibility:hidden;" id="sectionSubmitLabel">Double-check the information before pressing the button</span>
                                <button class="btn btn-primary create" type="submit" id="sectionButtonSubmit" style="visibility:hidden;"><i class="fa-solid fa-square-plus icon-white"></i> Create</button>
                            </div>
                        </div>

                            

                        

                    </fieldset>
                </form>
            </div>

            
        </div>
    </div>
</div>

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$('#studentSubjectID').on('keyup', function () {
  if ($(this).val().length === 9) {
    const allStudentID = document.querySelectorAll('#IDCheckVar');
    let condition = false;

    allStudentID.forEach(element => {
        console.log(element.textContent);
        if (element.textContent == $('#studentSubjectID').val()){
            condition = true;
        }
    });
    const inputElement = document.getElementById('studentSubjectID');
    const coupleElement = document.getElementById('studentSubjectName');
    if (condition == true){
            inputElement.setCustomValidity('Invalid input');
            inputElement.classList.remove('is-valid');
            inputElement.classList.add('is-invalid');
            coupleElement.classList.remove('is-invalid');
            coupleElement.classList.remove('is-valid'); 
            $('#sectionStudIDError').text('Section ID already exists in table');
        }
        else{
            console.log($(this).val());
            $.ajax({
            method: "POST",
            headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: "application/json"
            },
            url: "{{ route('get_name_data') }}",
            data: { input_data: $(this).val() },
            success: function(data) {
                console.log('bullshit');
                console.log(data=='');
                if (data != ''){
                    $('#sectionStudNameError').text('');
                    $('#sectionStudIDError').text('');
                    $('#sectionStudIDError').text('');
                    inputElement.setCustomValidity('');
                    coupleElement.setCustomValidity('');
                    inputElement.classList.remove('is-invalid');
                    inputElement.classList.add('is-valid');
                    coupleElement.classList.remove('is-invalid');
                    coupleElement.classList.add('is-valid');
                    $('#studentSubjectName').val(data);
                }
                else{
                    $('#studentSubjectName').val('');
                    inputElement.setCustomValidity('Invalid input');
                    inputElement.classList.remove('is-valid');
                    inputElement.classList.add('is-invalid');
                    $('#sectionStudIDError').text('Student does not Exist');
                }
            }
            }); 
        }
    }
    else{
        const inputElement = document.getElementById('studentSubjectID');
        inputElement.setCustomValidity('Invalid input');
        inputElement.classList.remove('is-valid');
        inputElement.classList.add('is-invalid');
        $('#sectionStudIDError').text('Input a 9 digit integer');
    }
});

function showSubmit(){
    $('#sectionButtonSubmit').css('visibility','visible');
    $('#sectionSubmitLabel').css('visibility','visible');
}

function hideSubmit(){
    $('#sectionSubmitLabel').css('visibility','hidden');
    $('#sectionButtonSubmit').css('visibility','hidden');
}

function finishVal(){
    if (($('#sectionGradeLevel').val()!=null) && ($('#sectionAdviserID').val()!='') && ($('#sectionAdviserID').hasClass('is-valid'))){
        showSubmit();
    }
    else{
        hideSubmit();
    }
}

$('#sectionGradeLevel,#sectionAdviserID').on('input click',function(){
    let numberStudents = document.getElementById("total_students").textContent;
    if ($(this).attr('id')=='sectionAddStudents'){
        console.log('fuck');
        numberStudents = numberStudents + 1;
    }
    console.log($('#sectionGradeLevel').val()!=null);
    if (($('GradeSectionNameID').val() != '')&&($('#sectionSubId').val().length == 5)&&($('#sectionGradeLevel').val()!=null) && ($('#sectionAdviserID').val()!='') && (numberStudents > 0) && ($('#sectionAdviserID').val().length == 9)){
        showSubmit();
    }
    else{
        hideSubmit();
    }
});

$('#studentSubjectName').on('input',function(){
    if ($(this).val().length >= 3){
        var dropdown = $('#myDropdown');
        dropdown.empty();
        const inputElement = document.getElementById('studentSubjectName');
        const coupleElement = document.getElementById('studentSubjectID');
        $.ajax({
            method: "POST",
            headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: "application/json"
            },
            url: "{{ route('get_all_students') }}",
            data: { input_data: $(this).val()},
            success: function(response) {
                console.log(response == '');
                console.log(response);
                if(response != ''){
                    const allStudentID = document.querySelectorAll('#IDCheckVar');
                    let condition = false;

                    allStudentID.forEach(element => {
                        console.log(element.textContent);
                        if (element.textContent == response){
                            condition = true;
                        }
                    });
                    if (condition == false){
                        $('#studentSubjectID').val(response);
                        $('#sectionStudNameError').text('');
                        $('#sectionStudIDError').text('');
                        inputElement.setCustomValidity('');
                        coupleElement.setCustomValidity('');
                        inputElement.classList.remove('is-invalid');
                        inputElement.classList.add('is-valid');
                        coupleElement.classList.remove('is-invalid');
                        coupleElement.classList.add('is-valid');
                    }
                    else{
                        $('#studentSubjectID').val('');
                        $('#studentSubjectName').val('');
                        inputElement.setCustomValidity('Invalid input');
                        coupleElement.classList.remove('is-valid');
                        coupleElement.classList.add('is-invalid');
                        inputElement.classList.remove('is-valid');
                        inputElement.classList.add('is-invalid');
                        $('#sectionStudNameError').text('Student already exists in table');
                    }
                    
                }
                else{
                    $('#studentSubjectID').val(response);
                    $('#sectionStudIDError').text('');
                    inputElement.setCustomValidity('Invalid input');
                    inputElement.classList.remove('is-valid');
                    inputElement.classList.add('is-invalid');
                    coupleElement.classList.remove('is-valid');
                    coupleElement.classList.remove('is-invalid');
                    $('#sectionStudNameError').text('Input incomplete or Student does not exist');
                }
            }

        });
    }
    else{
        $('#studentSubjectID').val('');
    }
});

$('#sectionAdviserID').on('keyup', function () {
    const inputElement = document.getElementById('sectionAdviserID');
    if ($(this).val().length === 9) {
        $.ajax({
            method: "POST",
            headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: "application/json"
            },
            url: "{{ route('get_adviser_id') }}",
            data: { input_data: $(this).val() },
            success: function(data) {
                console.log(data);
                if (data == true){
                    $('#sectionAdviserIDError').text('');
                    inputElement.setCustomValidity('');
                    inputElement.classList.remove('is-invalid');
                    inputElement.classList.add('is-valid');
                }
                else{
                    hideSubmit();
                    inputElement.setCustomValidity('Invalid input');
                    inputElement.classList.remove('is-valid');
                    inputElement.classList.add('is-invalid');
                    $('#sectionAdviserIDError').text('Adviser does not Exist');
                }
            }
            }); 
    }
    else{
        const inputElement = document.getElementById('sectionAdviserID');
        inputElement.setCustomValidity('Invalid input');
        inputElement.classList.remove('is-valid');
        inputElement.classList.add('is-invalid');
        $('#sectionAdviserIDError').text('Input a 9 digit integer');
    }
});

$('#addStudent').on('click', function () {
    // Get the table body element
    const tableBody = document.querySelector('#list tbody');

    // Create a new tr element
    const newRow = document.createElement('tr');
    // accept as long as both are not empty
    // later on, do not accept either are invalud
    if ($('#studentSubjectID').val().length != 0 && $('#studentSubjectName').val().length != 0){
        const studentName = $('#studentSubjectName').val().split(", ");
        const firstName = studentName[1];
        const lastName = studentName[0];
        const studentID = $('#studentSubjectID').val();

        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td id="IDCheckVar">${studentID}</td>
            <td>${firstName}</td>
            <td>${lastName}</td>
            <td class="delete"><button type='button' class='btnDelete' style="border:0px;"><i class="fa-solid fa-xmark"></i></button></td>
        `;

        tableBody.appendChild(newRow);
        $('#studentSubjectName').val(''); 
        $('#studentSubjectID').val('');

        const tableRows = document.querySelectorAll('#student_list tr').length;
        document.getElementById("total_students").textContent = tableRows;

        // clear validation shits
        let inputElement = document.getElementById('studentSubjectID');
        inputElement.classList.remove('is-valid');
        inputElement.setCustomValidity('');
        $('#sectionStudIDError').text('');

        inputElement = document.getElementById('studentSubjectName');
        inputElement.classList.remove('is-valid');
        inputElement.setCustomValidity('');
        $('#sectionStudNameError').text('');
  }
})
$(document).on('click', '.btnDelete', function(){
    $(this).closest('tr').remove();
    const tableRows = document.querySelectorAll('#student_list tr').length;
    document.getElementById("total_students").textContent = tableRows;
});

$('#sectionGradeLevel').on('click', function(){
    let inputElement = document.getElementById('sectionGradeLevel');
    if ($(this).val() != null){
        inputElement.setCustomValidity('');
        inputElement.classList.remove('is-invalid');
        inputElement.classList.add('is-valid');
        $('#sectionGradeLevelError').text('');
    }
    else{
        $('#sectionGradeLevel').setCustomValidity('Invalid select');
        inputElement.classList.add('is-invalid');
        inputElement.classList.remove('is-valid');
        $('#sectionGradeLevelError').text('Please Choose a Grade Level');
    }
});

$('#sectionSubId').on('input',function(){
    let inputElement = document.getElementById('sectionSubId');
    console.log(inputElement);
    if ($('#sectionSubId').val().length == 5){
        $.ajax({
            method: "POST",
            headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: "application/json"
            },
            url: "{{ route('get_section_id') }}",
            data: { input_data: $(this).val() },
            success: function(data) {
                console.log(data);
                if (data == true){
                    inputElement.setCustomValidity('');
                    inputElement.classList.remove('is-invalid');
                    inputElement.classList.add('is-valid');
                    $('#sectionIDError').text('');
                }
                else{
                    hideSubmit();
                    inputElement.setCustomValidity('Invalid input');
                    inputElement.classList.add('is-invalid');
                    inputElement.classList.remove('is-valid');
                    $('#sectionIDError').text('Please input a 5 digit integer');
                }
            }
            }); 
    }
    else{
        inputElement.setCustomValidity('Invalid input');
        inputElement.classList.add('is-invalid');
        inputElement.classList.remove('is-valid');
        $('#sectionIDError').text('Please input a 5 digit integer');
    }
});

$('#GradeSectionNameID').on('input',function(){
    let inputElement = document.getElementById('GradeSectionNameID');
    console.log(inputElement);
    if (($('#GradeSectionNameID').val().length != 0) && (/^[a-zA-Z ]+$/.test($('#GradeSectionNameID').val()))){
        inputElement.setCustomValidity('');
        inputElement.classList.remove('is-invalid');
        inputElement.classList.add('is-valid');
        $('#sectionNameIDError').text('');
    }
    else{
        inputElement.setCustomValidity('Invalid input');
        inputElement.classList.add('is-invalid');
        inputElement.classList.remove('is-valid');
        $('#sectionNameIDError').text('Please input a valid string');
    }
});

$('#registerSectionForm').submit(function (e) {
    let allStudentID = document.querySelectorAll('#IDCheckVar');
    let arrayStudentID = [];
    allStudentID.forEach(element => {
        arrayStudentID.push(element.textContent);
    });
    e.preventDefault();
    let formData = {
        allStudentID : arrayStudentID,
        adviserID : document.querySelector('#sectionAdviserID').value,
        sectionID : document.querySelector('#sectionSubId').value,
        sectionName : document.querySelector('#GradeSectionNameId').value,
        gradeLevel : document.querySelector('#sectionGradeLevel').value
    };
    console.log(formData);
    $(".is-invalid").children("strong").text("");
    $("#registerSectionForm input").removeClass("is-invalid");
    $.ajax({
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            Accept: "application/json"
        },
        url: "{{ route('register_section') }}",
        data: formData,
        success: () => window.location.assign(window.location.href) ,
        error: (response) => {
            if(response.status === 422) {
                let errors = response.responseJSON.errors;
                Object.keys(errors).forEach(function (key) {
                    $("#" + key + "Input").addClass("is-invalid");
                    $("#" + key + "Error").children("strong").text(errors[key][0]);
                });
            }
        }
    })

});

/*$('#sectionButtonSubmit').on('click', function(){
    
});*/

</script>

<!--This is supposed to add student details to row but for some  reason dili siya muwork T.T-->
<!--<script>
    function addRow() {
        "use strict";

        var table = document.getElementById("list"); 
          
        var row= document.createElement("tr");
        console.log(row);
        var td1 = document.createElement("td");
        var td2 = document.createElement("td");

        td1.innerHTML = document.getElementById("studid").value;
        td2.innerHTML  = document.getElementById("studname").value;

        row.appendChild(td1);
        row.appendChild(td2);

        table.children[0].appendChild(row);
    };
</script>-->
@endsection
