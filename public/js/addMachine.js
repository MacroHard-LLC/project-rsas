const addMachineModal = document.getElementById('addMachineModal')
addMachineModal.addEventListener('shown.bs.modal', function() {
    checkOverallAddMachineValidity();
    let addMachineForm = document.getElementById('addMachineForm');

    ['input','change'].forEach(evt =>
        addMachineForm.querySelectorAll(".form-control, .form-check-input").forEach(input => {
            input.addEventListener(evt, addMachineInputListener(input));
        })
    );
});

const addMachineInputListener = (input) => {
    return () => {
        $("#" + input.getAttribute("name") + "_error").children("span").text("");

        if (input.checkValidity()) {
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
        } else {
            input.classList.remove('is-valid');
            input.classList.add('is-invalid');
            showAddMachineClientError(input);
        }

        checkOverallAddMachineValidity();
    };
};

addMachineModal.addEventListener('hidden.bs.modal', function(){
    // Remove event listeners
    const inputElements = addMachineModal.querySelectorAll('.form-control, .form-check-input');
    inputElements.forEach(input => {
        input.removeEventListener('input', addMachineInputListener);
        input.removeEventListener('change', addMachineInputListener);
    });
});

function checkOverallAddMachineValidity(){
    var form_children = $("#addMachineForm").children();
    var formControl = form_children.find('.form-control')
    var validFormControl = form_children.find('.form-control.is-valid')
    var checkedRadio = form_children.find($('input[type="radio"]:checked'));
    var is_valid = formControl.length === validFormControl.length && checkedRadio.length == 1;
    if (is_valid)
        document.getElementById("submitNewMachine").style.visibility = "visible";
    else
        document.getElementById("submitNewMachine").style.visibility = "hidden";
}

function showAddMachineClientError(input){
    var input_name = input.getAttribute("name");
    var error =  $("#" + input_name + "_error").children("span");
    if (input_name = "machine_room"){
        if (input.validity.patternMismatch)
            error.text("Room name must not contain special characters.");
        else if (input.validity.tooShort)
            error.text("Room name must have at least 1 character.");
        else if (input.validity.tooLong)
            error.text("Room name must have a maximum of 20 characters.");
    } else if (input_name = 'machine_status' && input.validity.valueMissing)
        error.text("Please select a status for the machine.");
}
