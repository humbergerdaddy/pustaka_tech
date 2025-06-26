<div id="editBookModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Edit Book</h3>
                <button class="close-btn" onclick="closeModal('editBookModal')">&times;</button>
            </div>
            <form>
                <div class="form-group">
                    <label for="edit-title">Title</label>
                    <input type="text" id="edit-title" class="form-control" value="The Great Gatsby" required>
                </div>
                <div class="form-group">
                    <label for="edit-author">Author</label>
                    <input type="text" id="edit-author" class="form-control" value="F. Scott Fitzgerald" required>
                </div>
                <div class="form-group">
                    <label for="edit-isbn">ISBN</label>
                    <input type="text" id="edit-isbn" class="form-control" value="9780743273565" required>
                </div>
                <div class="form-group">
                    <label for="edit-quantity">Quantity</label>
                    <input type="number" id="edit-quantity" class="form-control" min="1" value="8" required>
                </div>
                <div class="form-group">
                    <label for="edit-available">Available</label>
                    <input type="number" id="edit-available" class="form-control" min="0" value="5" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" onclick="closeModal('editBookModal')">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Book</button>
                </div>
            </form>
        </div>
    </div>