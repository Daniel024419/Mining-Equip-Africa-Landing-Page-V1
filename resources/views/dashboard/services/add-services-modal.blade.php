<div id="addServiceModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-white bg-success">
                <h5 class="modal-title">Add New Service</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span class="text-white">&times;</span>
                </button>
            </div>

            <form action="{{ route('dashboard.services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="title">Service Title</label>
                            <input type="text" name="title" class="form-control" required />
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="category">Category</label>
                            <input type="text" name="category" class="form-control" />
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="description">Description</label>
                            <textarea name="description" rows="3" class="form-control"></textarea>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="icon">Choose Icon</label>
                            <select name="icon" class="form-control">
                                <option value="">Select an icon</option>
                                @foreach ([
                                    'fas fa-hard-hat' => 'Hard Hat',
                                    'fas fa-truck-loading' => 'Truck Loading',
                                    'fas fa-dumpster' => 'Dumpster',
                                    'fas fa-tools' => 'Tools',
                                    'fas fa-cogs' => 'Cogs',
                                    'fas fa-industry' => 'Industry',
                                    'fas fa-hammer' => 'Hammer',
                                    'fas fa-wrench' => 'Wrench',
                                    'fas fa-screwdriver' => 'Screwdriver',
                                    'fas fa-truck-moving' => 'Truck Moving',
                                    'fas fa-trailer' => 'Trailer',
                                    'fas fa-oil-can' => 'Oil Can',
                                    'fas fa-mountain' => 'Mountain',
                                    'fas fa-gem' => 'Gem',
                                    'fas fa-shield-alt' => 'Safety Shield',
                                    'fas fa-anchor' => 'Anchor',
                                    'fas fa-fire-extinguisher' => 'Fire Extinguisher',
                                    'fas fa-plug' => 'Electric/Plug',
                                    'fas fa-recycle' => 'Recycle',
                                    'fas fa-bolt' => 'Power/Bolt',
                                ] as $icon => $label)
                                    <option value="{{ $icon }}">{{ $label }} ({{ $icon }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="image">Service Image</label>
                            <input type="file" name="image" class="form-control-file" />
                            <small class="form-text text-muted">Max size: 3MB</small>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save Service</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>

        </div>
    </div>
</div>
