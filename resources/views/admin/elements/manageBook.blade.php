<div id="books" class="tab-content active">
                    <div class="card-header">
                        <h2>Book List</h2>
                        <button class="btn btn-primary" onclick="openModal('addBookModal')">
                            <i class="fas fa-plus"></i> Add New Book
                        </button>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>ISBN</th>
                                <th>Available</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>The Great Gatsby</td>
                                <td>F. Scott Fitzgerald</td>
                                <td>9780743273565</td>
                                <td>5/8</td>
                                <td>
                                    <button class="btn btn-primary" onclick="openModal('editBookModal')">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>To Kill a Mockingbird</td>
                                <td>Harper Lee</td>
                                <td>9780061120084</td>
                                <td>3/5</td>
                                <td>
                                    <button class="btn btn-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>1984</td>
                                <td>George Orwell</td>
                                <td>9780451524935</td>
                                <td>2/4</td>
                                <td>
                                    <button class="btn btn-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>