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
                                        <input type="text" class="form-control form-control-sm" placeholder="Input a 5 digit integer between 0-5" name="sectionSubId" id="sectionSubId" minlength="5" maxlength="5" pattern="[0-5]+" required>
                                        <div class="is-invalid" id="idError">
                                            <span id="sectionIDError"></span>
                                        </div>
                                    </div>
                                </div>                                
                                
                                <div class="col-md-6 input-field">
                                    <div class="form-outline">
                                        <label for="subj_id" class="input-title">Section Name</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Enter Section Name" name="sectionSubName" id="sectionSubName" required>
                                        <div class="is-invalid" id="secnameError">
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="row mb-3">
                                <div class="col-md-6 input-field"> 
                                    <label for="grade_level" class="input-title">Grade Level</label>   
                                    <select name="grade_level" class="form-control form-select" placeholder="Choose Department ID" id="grade_level" required>
                                        <option value="1">Level 1</option>
                                        <option value="2">Level 2</option>
                                        <option value="3">Level 3</option>
                                        <option value="4">Level 4</option>
                                        <option value="5">Level 5</option>
                                        <option value="6">Level 6</option>
                                        <option value="7">Level 7</option>
                                        <option value="8">Level 8</option>
                                        <option value="9">Level 9</option>
                                        <option value="10">Level 10</option>
                                    </select>
                                    <div class="is-invalid" role="alert" id="gradeError" name="gradeError">
                                        <strong></strong>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6 input-field">
                                    <div class="form-outline">
                                        <label for="subj_id" class="input-title">Adviser ID</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Input a 5 digit integer" name="subj_id" minlength="5" maxlength="5" pattern="[0-5]+" required>
                                        <div class="is-invalid" id="idError">
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="row mb-3">
                                <div class="col-md-5 input-field ">
                                    <div class="form-outline">
                                        <label for="subj_id" class="input-title">Student ID</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Input a 5 digit integer" id="studentSubjectID" name="studentSubjectID" minlength="9" maxlength="9" pattern="[0-5]" required>
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
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                </div>
                            
                                <div class="col-md-2 input-field float-end">
                                    <div class="form-group pt-3">
                                        <button type='button' class="btn btn-primary create" id="addStudent" name="addStudent"><i class="fa-solid fa-user-plus"></i>  Add</button>
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
                                        <th style="width:20px;"></th>
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
                                <span class="submit-reminder me-3">Double-check the information before pressing the button</span>
                                <button class="btn btn-primary" type="submit"><i class="fa-solid fa-square-plus icon-white"></i> Create</button>
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
    if (condition == true){
            inputElement.setCustomValidity('Invalid input');
            inputElement.classList.remove('is-valid');
            inputElement.classList.add('is-invalid');
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
                console.log(data=='');
                if (data != ''){
                    $('#sectionStudIDError').text('');
                    inputElement.setCustomValidity('');
                    inputElement.classList.remove('is-invalid');
                    inputElement.classList.add('is-valid');
                    $('#studentSubjectName').val(data);
                }
                else{
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
        const inputElement = document.getElementById('studentSubjectID');
        inputElement.classList.remove('is-valid');
        inputElement.setCustomValidity('');
        $('#sectionStudIDError').text('');
  }
})
$(document).on('click', '.btnDelete', function(){
    $(this).closest('tr').remove();
    const tableRows = document.querySelectorAll('#student_list tr').length;
    document.getElementById("total_students").textContent = tableRows;
});

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
