

<div class="modal modal-danger fade" id="editAttendanceModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title white-label"><i class="fa-solid fa-circle"></i> EDIT ATTENDANCE</h5>
            </div>
            <form method="POST" action="{{route('deleteUser')}}">
                <div class="modal-body text-center">
                    @csrf
                    @method('DELETE')
                    <h5>Choose the Status of the User</h5>
                    <br>
                    <div class="some-class">
                        <input type="radio" class="radio" name="x" value="y" id="y" />
                        <label for="y">Present</label>
                        <input type="radio" class="radio" name="x" value="z" id="z" />
                        <label for="z">Absent</label>
                        <input type="radio" class="radio" name="x" value="z" id="x" />
                        <label for="x">Late</label>
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
