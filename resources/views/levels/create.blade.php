<div class="modal fade" id="createSectionModal" tabindex="-1" role="dialog" aria-labelledby="createSectionModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class='modal-content'>
            <div class='modal-header'>
                <h1 class="modal-title fs-5" id="registerModalLabel"><i class="fa-solid fa-circle"></i> CREATE SECTION</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body mx-5 my-3" id="modalBody">
                <form method="POST" id="createSectionForm" class="needs-validation" novalidate>
                    @csrf
                    <fieldset>
                        <div class="row mb-3">
                            <div class="col-md-6 input-field">
                                <div class="form-outline">
                                    <label for="subj_id" class="input-title">Section ID</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Input a 5 digit integer" name="section_id" id="section_id_input" pattern="[0-9]+" minlength="5" maxlength="5" required>
                                    <div class="is-invalid" id="section_id_error">
                                        <span></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 input-field">
                                <div class="form-outline">
                                    <label for="subj_id" class="input-title">Section Name</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Enter Section Name" name="section_name" id="section_name_input" required>
                                    <div class="is-invalid" id="section_name_error">
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                                <div class="col-md-6 input-field">
                                    <label for="grade_level" class="input-title">Grade Level</label>
                                    <select name="section_grade_level" class="form-control form-select" id="section_grade_level_input" required>
                                        <option value="" disabled selected="selected">Choose a Grade Level</option>
                                        @for ($i = 7; $i < 11; $i++)
                                        <option value={{$i}}>Level {{$i}}</option>
                                        @endfor
                                    </select>
                                    <div class="is-invalid" id="section_grade_level_error">
                                        <strong></strong>
                                    </div>
                                </div>

                                <div class="col-md-6 input-field">
                                    <div class="form-outline">
                                        <label for="subj_id" class="input-title">Adviser ID</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Input a 5 digit integer" name="sectionAdviserID" id="sectionAdviserID" minlength="9" maxlength="9" pattern="[0-9]+" required>
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
                                    <div id="myDropdown"></div>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="is-invalid" role="alert">
                                        <span id="sectionStudNameError"></span>
                                    </div>
                                </div>
                                </div>

                                <div class="col-md-2 input-field float-end">
                                    <div class="form-group pt-3">
                                        <button type='button' class="btn btn-primary create" id="addStudent" name="sectionAddStudent" id="sectionAddStudent" onclick="finishVal()"><i class="fa-solid fa-user-plus"></i>  Add</button>
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
