<!-- ADD BOOTH -->
<div class="modal fade" id="addBoothModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <form action="booths_crud.php" method="POST" enctype="multipart/form-data" class="modal-content">
            <input type="hidden" name="action" value="create">

            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Add Booth</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Booth Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-success">Save Booth</button>
            </div>
        </form>
    </div>
</div>

<!-- EDIT BOOTH -->
<div class="modal fade" id="editBoothModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <form action="booths_crud.php" method="POST" enctype="multipart/form-data" class="modal-content">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" id="edit-id">
            <input type="hidden" name="old_image" id="edit-old-image">

            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Edit Booth</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <input type="text" name="name" id="edit-name" class="form-control mb-3" required>
                <input type="text" name="location" id="edit-location" class="form-control mb-3" required>
                <textarea name="description" id="edit-description" class="form-control mb-3"></textarea>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="modal-footer">
                <button class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>

<!-- DELETE BOOTH -->
<div class="modal fade" id="deleteBoothModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form action="booths_crud.php" method="POST" class="modal-content">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" id="delete-id">

            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Delete Booth</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                Are you sure you want to delete this booth?
            </div>

            <div class="modal-footer">
                <button class="btn btn-danger">Yes, Delete</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('editBoothModal')
        .addEventListener('show.bs.modal', e => {
            const b = e.relatedTarget;

            document.getElementById('edit-id').value = b.dataset.id;
            document.getElementById('edit-name').value = b.dataset.name;
            document.getElementById('edit-location').value = b.dataset.location;
            document.getElementById('edit-description').value = b.dataset.description;
            document.getElementById('edit-old-image').value = b.dataset.image;
        });

    document.getElementById('deleteBoothModal')
        .addEventListener('show.bs.modal', e => {
            document.getElementById('delete-id').value =
                e.relatedTarget.dataset.id;
        });
</script>