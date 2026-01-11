<!-- Add Attendee -->
<div class="modal fade" id="addAttendeeModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form action="attendees_crud.php" method="POST" class="modal-content">
            <input type="hidden" name="action" value="create">

            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Add Attendee</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ticket Type</label>
                    <select name="ticket_type" class="form-control" required>
                        <option value="">-- Select Ticket Type --</option>
                        <option value="Student">Student</option>
                        <option value="Faculty">Faculty</option>
                        <option value="Staff">Staff</option>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-success">Save Attendee</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Attendee -->
<div class="modal fade" id="editAttendeeModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form action="attendees_crud.php" method="POST" class="modal-content">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" id="edit-attendee-id">

            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Edit Attendee</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" id="edit-attendee-name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" id="edit-attendee-email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ticket Type</label>
                    <select name="ticket_type" id="edit-attendee-ticket" class="form-control" required>
                        <option value="">-- Select Ticket Type --</option>
                        <option value="Student">Student</option>
                        <option value="Faculty">Faculty</option>
                        <option value="Staff">Staff</option>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Attendee -->
<div class="modal fade" id="deleteAttendeeModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form action="attendees_crud.php" method="POST" class="modal-content">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" id="delete-attendee-id">

            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Delete Attendee</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                Are you sure you want to delete this attendee?
            </div>

            <div class="modal-footer">
                <button class="btn btn-danger">Yes, Delete</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('editAttendeeModal').addEventListener('show.bs.modal', e => {
        const b = e.relatedTarget;
        document.getElementById('edit-attendee-id').value = b.dataset.id;
        document.getElementById('edit-attendee-name').value = b.dataset.name;
        document.getElementById('edit-attendee-email').value = b.dataset.email;
        document.getElementById('edit-attendee-ticket').value = b.dataset.ticket;
    });

    document.getElementById('deleteAttendeeModal').addEventListener('show.bs.modal', e => {
        document.getElementById('delete-attendee-id').value = e.relatedTarget.dataset.id;
    });
</script>