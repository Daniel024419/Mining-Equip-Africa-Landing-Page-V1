<div id="addEquipmentModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addEquipmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('dashboard.equipments.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header text-white bg-success">
                    <h5 class="modal-title" id="addEquipmentModalLabel">Add New Equipment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-white">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Equipment Name</label>
                            <input type="text" name="name" id="name" class="form-control" required />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control" required>
                                <option value="">Select a category</option>
                                @php
                                    $categories = ['Surface', 'Underground', 'Refurbished', 'Heavy Machinery', 'Light Equipment', 'Safety Gear', 'Electrical', 'Hydraulic', 'Conveyors', 'Drilling', 'Loading', 'Transport', 'Maintenance Tools'];
                                @endphp
                                @foreach ($categories as $category)
                                    <option value="{{ strtolower($category) }}">{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="condition">Condition</label>
                            <select name="condition" id="condition" class="form-control" required>
                                <option value="">Select condition</option>
                                <option value="new">New</option>
                                <option value="used">Used</option>
                                <option value="refurbished">Refurbished</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="year">Year of Manufacture</label>
                            <input type="number" name="year" id="year" class="form-control" min="1900" max="{{ date('Y') }}" />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="price">Price (GHS)</label>
                            <input type="number" name="price" id="price" class="form-control" step="0.01" min="0" />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="image">Equipment Image</label>
                            <input type="file" name="image" id="image" class="form-control-file" />
                            <small class="form-text text-muted">Max size: 3MB</small>
                        </div>

                        <div class="form-group col-12">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                        </div>
                    </div> <!-- /.form-row -->
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save Equipment</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
