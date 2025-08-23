<div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="edituserForm">
                    <input type="hidden" id="edit-id">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" class="form-control form-cntrl" id="edit-name">
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control form-cntrl" id="edit-email" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="updateUserBtn" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
