<div id="addPostModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" action="{{ route('dashboard.posts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header text-white bg-primary">
                    <h5 class="modal-title">Add New Post</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span class="text-white">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required />
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" required />
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="excerpt">Excerpt</label>
                            <textarea name="excerpt" id="excerpt" class="form-control" rows="2"></textarea>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="image">Upload Image</label>
                            <div class="custom-file">
                                <input type="file" name="image" id="image" class="custom-file-input" />
                                <label for="image" class="custom-file-label">Choose file</label>
                            </div>
                            <small class="text-muted">Maximum size: 3MB</small>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="published_at">Publish Date</label>
                            <input type="datetime-local" name="published_at" id="published_at" class="form-control" />
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="content">Content</label>
                            <textarea name="content" id="content" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
