<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.partials.head')
    <title>Mining Equip Africa | Project | Edit</title>
</head>

<body>
    @include('dashboard.partials.nav')

    <!-- EDIT PROJECT FORM -->
    <div class="card mx-4 mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Edit Project</h4>
        </div>

        <form action="{{ route('dashboard.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body row">
                <!-- Title -->
                <div class="col-md-6 form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control"
                        value="{{ old('title', $project->title) }}" required>
                </div>

                <!-- Category -->
                <div class="col-md-6 form-group">
                    <label for="category">Category</label>
                    <select name="category" class="form-control" required>
                        <option value="" disabled {{ !$project->category ? 'selected' : '' }}>Choose a category
                        </option>
                        @foreach (['Exploration', 'Drilling', 'Excavation', 'Logistics', 'Construction', 'Processing'] as $cat)
                            <option value="{{ $cat }}" {{ $project->category === $cat ? 'selected' : '' }}>
                                {{ $cat }}</option>
                        @endforeach
                    </select>
                </div>


                <!-- Description -->
                <div class="col-md-12 form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $project->description) }}</textarea>
                </div>

                <!-- Badges -->
                <!-- Badges -->
                <div class="form-group col-md-12">
                    <label for="badges">Project Badges (Multiple Selection)</label>
                    <select name="badges[]" class="form-control" multiple required>
                        @foreach (['RC Drilling', 'Diamond Drilling', 'Blast Drilling', 'Underground Mining', 'Surface Mining', 'Operator Training', 'Maintenance', 'Fleet Management', 'Equipment Lease', 'Heavy Duty Trucks', 'Excavators', 'Drill Rigs', 'Safety', 'Certification', 'High Altitude', 'Custom Rigs', 'Remote Locations', 'Logistics', 'Hydraulic Equipment', 'Multi-Country Projects'] as $badge)
                            <option value="{{ $badge }}"
                                {{ in_array($badge, $project->badges ?? []) ? 'selected' : '' }}>
                                {{ $badge }}
                            </option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">Hold Ctrl (or Cmd on Mac) to select multiple badges.</small>
                </div>


                <!-- Image -->
                <div class="col-md-6 form-group">
                    <label for="image">Change Image</label>
                    <div class="custom-file">
                        <input type="file" name="image" id="image" class="custom-file-input">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                    @if ($project->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $project->image) }}" alt="Project Image"
                                class="img-fluid rounded" style="max-height: 200px;">
                        </div>
                    @endif
                </div>
            </div>

            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Update Project</button>
                <a href="{{ route('dashboard.projects.index') }}" class="btn btn-secondary">Go Back</a>
            </div>
        </form>
    </div>

    <!-- FOOTER -->
    @include('dashboard.partials.footer')
    @include('dashboard.partials.script')

    <script>
        // Update file input label
        document.querySelector('.custom-file-input').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name;
            const label = e.target.nextElementSibling;
            if (fileName && label) label.innerText = fileName;
        });
    </script>

</body>

</html>
