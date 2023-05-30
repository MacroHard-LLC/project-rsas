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