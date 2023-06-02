<!-- $(document).on('click', '#studentTag', function() {
        //var element = $(this).siblings('span');
        //var value = element.data('id');
        var element = $(this).closest('td').find('span');
        console.log(element)
        var value = element.data('id');

        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                Accept: "application/json"
            },
            url: "{{ route('add_id_edit_status') }}",
            data: {value},
            success: function(data) {
                console.log(data);
            }
        });
    }); -->

<!-- $(document).ready(function() {
  $('#updateStatus').on('click', function() {
    var status = $('input[name="status"]:checked').val();
    var student_id = $('#studentId').val();

    $.ajax({
      url: '/update-student-status',
      type: 'POST',
      data: {
        status: status,
        studentId: studentId,
      },
      success: function(data) {
        if (data.success) {
          $('#myModal').modal('hide');
          alert('Status updated successfully!');
        } else {
          alert('Error updating status!');
        }
      },
    });
  });
}); -->

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

