<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.partials.head')
    <title>Mining Equip Africa | Service | Show</title>    
</head>

<body>
    @include('dashboard.partials.nav')

    <!-- SERVICE INFO CARD -->
    <div class="card mx-4 mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Show Service</h4>
            <div class="publish-status">
                @if ($service->published_at)
                    <span class="badge badge-success">Published</span>
                @else
                    <span class="badge badge-secondary">Unpublished</span>
                @endif
            </div>
        </div>

        <div class="card-body row">
            <!-- Title -->
            <div class="col-md-6 mb-3">
                <h6 class="text-muted">Title</h6>
                <p class="mb-0">{{ $service->title }}</p>
            </div>

            <!-- Category -->
            <div class="col-md-6 mb-3">
                <h6 class="text-muted">Category</h6>
                <p class="mb-0">{{ $service->category }}</p>
            </div>

            <!-- Description -->
            <div class="col-md-12 mb-3">
                <h6 class="text-muted">Description</h6>
                <p class="mb-0">{{ $service->description }}</p>
            </div>

            <!-- Icon -->
            <div class="col-md-6 mb-3">
                <h6 class="text-muted">Icon</h6>
                <p class="mb-0"><i class="{{ $service->icon }}"></i> ({{ $service->icon }})</p>
            </div>

            <!-- Image -->
            <div class="col-md-6 mb-3">
                <h6 class="text-muted">Image</h6>
                @if ($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" alt="Service Image" class="img-fluid rounded" style="max-height: 200px;">
                @else
                    <p>No image uploaded</p>
                @endif
            </div>

            <div class="col-md-6 mb-3">
                <a href="{{ route('dashboard.services.index') }}" class="btn btn-secondary">Go Back</a>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    @include('dashboard.partials.footer')
    @include('dashboard.partials.script')

</body>
</html>
