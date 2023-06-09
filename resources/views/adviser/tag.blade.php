<div class="modal modal-danger fade" id="tagModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title white-label"><i class="fa-solid fa-circle"></i> EDIT TAG</h5>
            </div>
            <form method="GET">
                <div class="modal-body text-center">
                    @csrf
                    <h5>Choose the Status of the Student</h5>
                    <br>
                    <div class="some-class">
                        <input type="radio" class="radio" name="x" value="Enrolled" id="y" />
                        <label for="y">Enrolled</label>
                        <input type="radio" class="radio" name="x" value="Dropped" id="z" />
                        <label for="z">Dropped</label>
                    </div>
                </div>
                <input type="hidden" name="id" id="id" value="">
                <div class="modal-footer justify-content-evenly">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-secondary"></i> Change</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    // Get the button element
    const buttonSubmitEditStatus = document.querySelector('button[type="submit"]');
    //const studentId = document.querySelector('#editAttendanceModal td[data-student-id]').getAttribute('data-student-id');

    // Add a click event listener to the button
    buttonSubmitEditStatus.addEventListener('click', function(event) {
        event.preventDefault(); // prevent the default form submission
        const radioButtons = document.querySelectorAll('.radio');
        var selectedValue = '';
        radioButtons.forEach((radioButton) => {
                if (radioButton.checked) {
                // Get the value of the selected radio button
                selectedValue = radioButton.value;
                }
            });

        let input_data = {
            new_status : selectedValue,
        };
    

        $.ajax({
            method: "POST",
            headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: "application/json"
            },
            url: "{{ route('change_status') }}",
            data: { input_data},
            success: function(data) {
                location.reload();
            }
            });
    });

</script>