<div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title white-label"><i class="fa-solid fa-circle icon-white"></i> DELETE SUBJECT</h5>
            </div>
            <form method="POST" action="{{route('deleteSubject')}}">
                <div class="modal-body text-center">
                    @csrf
                    @method('DELETE')
                    <h5>Are you sure you want to delete this subject?</h5>
                    <br>
                    <h5 id="displayId"><b>ID:</b> <span></span></h5>
                    <h5 id="displayName"><b>Name:</b> <span></span></h5>
                    <h5 id="displayGradeLevel"><b>Grade Level:</b> <span></span></h5>
                </div>
                <input type="hidden" name="id" id="id" value="">
                <div class="modal-footer justify-content-evenly">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i> Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
