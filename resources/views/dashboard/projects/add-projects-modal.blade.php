<div id="addProjectModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" action="{{ route('dashboard.projects.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Add New Project</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body row">
                    <div class="form-group col-md-6">
                        <label for="title">Project Title</label>
                        <input type="text" name="title" class="form-control" required />
                    </div>

                    <div class="form-group col-md-6">
                        <label for="category">Category</label>
                        <select name="category" class="form-control" required>
                            <option value="" disabled selected>Choose a category</option>
                            @foreach (['Exploration', 'Drilling', 'Excavation', 'Logistics', 'Construction', 'Processing'] as $cat)
                                <option value="{{ $cat }}">{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="badges">Project Badges (Multiple Selection)</label>
                        <select name="badges[]" class="form-control" multiple required>
                            @foreach (['RC Drilling', 'Diamond Drilling', 'Blast Drilling', 'Underground Mining', 'Surface Mining', 'Operator Training', 'Maintenance', 'Fleet Management', 'Equipment Lease', 'Heavy Duty Trucks', 'Excavators', 'Drill Rigs', 'Safety', 'Certification', 'High Altitude', 'Custom Rigs', 'Remote Locations', 'Logistics', 'Hydraulic Equipment', 'Multi-Country Projects'] as $badge)
                                <option value="{{ $badge }}">{{ $badge }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Hold Ctrl (or Cmd on Mac) to select multiple badges.</small>
                    </div>


                    <div class="form-group col-md-12">
                        <label for="description">Description</label>
                        <textarea name="description" rows="4" class="form-control" placeholder="Brief description about the project..."></textarea>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="image">Project Image</label>
                        <input type="file" name="image" class="form-control-file" />
                        <small class="form-text text-muted">Max size: 3MB</small>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save Project</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
