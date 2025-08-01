<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.partials.head')
    <title>Mining Equip Africa | Project | Show</title>    
</head>

<body>
    @include('dashboard.partials.nav')

    <!-- PROJECT DETAILS CARD -->
    <div class="card mx-4 mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Show Project</h4>
            
        </div>

        <div class="card-body row">
            <!-- Title -->
            <div class="col-md-6 mb-3">
                <h6 class="text-muted">Title</h6>
                <p class="mb-0">{{ $project->title }}</p>
            </div>

            <!-- Category -->
            <div class="col-md-6 mb-3">
                <h6 class="text-muted">Category</h6>
                <p class="mb-0">{{ $project->category }}</p>
            </div>

            <!-- Description -->
            <div class="col-md-12 mb-3">
                <h6 class="text-muted">Description</h6>
                <p class="mb-0">{{ $project->description }}</p>
            </div>

            <!-- Badges -->
            @if (is_array($project->badges) && count($project->badges))
                <div class="col-md-12 mb-3">
                    <h6 class="text-muted">Badges</h6>
                    @foreach ($project->badges as $badge)
                        <span class="badge badge-info mr-1">{{ $badge }}</span>
                    @endforeach
                </div>
            @endif

            <!-- Image -->
            <div class="col-md-12 mb-3">
                <h6 class="text-muted">Image</h6>
                @if ($project->image)
                    <img src="{{ asset('files/' . $project->image) }}" alt="Project Image" class="img-fluid rounded" style="max-height: 300px;">
                @else
                    <p>No image uploaded</p>
                @endif
            </div>
        </div>

        <div class="card-footer text-right">
            <a href="{{ route('dashboard.projects.index') }}" class="btn btn-secondary">Go Back</a>
        </div>
    </div>

    <!-- FOOTER -->
    @include('dashboard.partials.footer')
    @include('dashboard.partials.script')

</body>

</html>
