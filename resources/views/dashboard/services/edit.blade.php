<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.partials.head')
    <title>Mining Equip Africa | Service | Edit</title>    
</head>

<body>
    @include('dashboard.partials.nav')

    <!-- EDIT SERVICE FORM -->
    <div class="card mx-4 mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Edit Service</h4>
        </div>

        <form action="{{ route('dashboard.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body row">
                <!-- Title -->
                <div class="col-md-6 form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $service->title) }}" required>
                </div>

                <!-- Category -->
                <div class="col-md-6 form-group">
                    <label for="category">Category</label>
                    <input type="text" name="category" id="category" class="form-control" value="{{ old('category', $service->category) }}" required>
                </div>

                <!-- Description -->
                <div class="col-md-12 form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" rows="4" class="form-control" required>{{ old('description', $service->description) }}</textarea>
                </div>

                <!-- Icon -->
                <div class="col-md-6 form-group">
                    <label for="icon">Icon (CSS class e.g. `fas fa-cog`)</label>
                    <input type="text" name="icon" id="icon" class="form-control" value="{{ old('icon', $service->icon) }}">
                    @if ($service->icon)
                        <div class="mt-2"><i class="{{ $service->icon }}"></i> Current Icon</div>
                    @endif
                </div>

                <!-- Image -->
                <div class="col-md-6 form-group">
                    <label for="image">Change Image</label>
                    <div class="custom-file">
                        <input type="file" name="image" id="image" class="custom-file-input">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                    @if ($service->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $service->image) }}" alt="Service Image" class="img-fluid rounded" style="max-height: 150px;">
                        </div>
                    @endif
                </div>
            </div>

            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Update Service</button>
                <a href="{{ route('dashboard.services.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <!-- FOOTER -->
    @include('dashboard.partials.footer')
    @include('dashboard.partials.script')

    <script>
        // For custom-file-input label
        document.querySelector('.custom-file-input').addEventListener('change', function (e) {
            var fileName = document.getElementById("image").files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
    </script>

</body>
</html>
