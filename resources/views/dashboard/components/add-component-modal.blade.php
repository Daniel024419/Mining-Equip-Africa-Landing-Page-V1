<div id="addComponentModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addComponentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('dashboard.components.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header text-white bg-success">
                    <h5 class="modal-title" id="addComponentModalLabel">Add New Component</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-white">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Component Name</label>
                            <input type="text" name="name" id="name" class="form-control" required />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="part_number">Part Number</label>
                            <input type="text" name="part_number" id="part_number" class="form-control" />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="manufacturer">Manufacturer</label>
                            <input type="text" name="manufacturer" id="manufacturer" class="form-control" />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="condition">Condition</label>
                            <select name="condition" id="condition" class="form-control">
                                <option value="">Select condition</option>
                                <option value="New">New</option>
                                <option value="Used">Used</option>
                                <option value="Rebuilt">Rebuilt</option>
                                <option value="Refurbished">Refurbished</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="price">Price (GHS)</label>
                            <input type="number" name="price" id="price" class="form-control" step="0.01"
                                min="0" />
                        </div>

                        <div class="form-group col-md-12">
                            <label for="images">Images</label>
                            <input type="file" name="images[]" id="images" class="form-control-file" multiple />
                            <small class="form-text text-muted">You may upload multiple images. Each max 5MB.</small>
                        </div>

                        <div class="form-group col-12">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                        </div>
                    </div> <!-- /.form-row -->
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save Component</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
