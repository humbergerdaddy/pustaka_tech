<div id="addBookModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add New Book</h3>
                <button class="close-btn" onclick="closeModal('addBookModal')">&times;</button>
            </div>
            <form>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" id="author" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" id="isbn" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" class="form-control" min="1" value="1" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" onclick="closeModal('addBookModal')">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Book</button>
                </div>
            </form>
        </div>
    </div>