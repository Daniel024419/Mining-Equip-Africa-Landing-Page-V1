<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.partials.head')
    <title>Mining Equip Africa | Equipment | Show</title>    
</head>

<body>
    @include('dashboard.partials.nav')

    <!-- EQUIPMENT DETAILS CARD -->
    <div class="card mx-4 mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Show Equipment</h4>
        </div>

        <div class="card-body row">
            <!-- Name -->
            <div class="col-md-6 mb-3">
                <h6 class="text-muted">Name</h6>
                <p class="mb-0">{{ $equipment->name }}</p>
            </div>

            <!-- Category -->
            <div class="col-md-6 mb-3">
                <h6 class="text-muted">Category</h6>
                <p class="mb-0">{{ $equipment->category }}</p>
            </div>

            <!-- Condition -->
            <div class="col-md-6 mb-3">
                <h6 class="text-muted">Condition</h6>
                <p class="mb-0">{{ $equipment->condition }}</p>
            </div>

            <!-- Year -->
            <div class="col-md-6 mb-3">
                <h6 class="text-muted">Year</h6>
                <p class="mb-0">{{ $equipment->year }}</p>
            </div>

            <!-- Price -->
            <div class="col-md-6 mb-3">
                <h6 class="text-muted">Price</h6>
                <p class="mb-0">GHS{{ number_format($equipment->price, 2) }}</p>
            </div>

            <!-- Description -->
            <div class="col-md-12 mb-3">
                <h6 class="text-muted">Description</h6>
                <p class="mb-0">{{ $equipment->description }}</p>
            </div>

            <!-- Image -->
            <div class="col-md-12 mb-3">
                <h6 class="text-muted">Image</h6>
                @if ($equipment->image)
                    <img src="{{ asset('storage/' . $equipment->image) }}" alt="Equipment Image" class="img-fluid rounded" style="max-height: 300px;">
                @else
                    <p>No image available</p>
                @endif
            </div>
        </div>

        <div class="card-footer text-right">
            <a href="{{ route('dashboard.equipments.index') }}" class="btn btn-secondary">Go Back</a>
        </div>
    </div>

    <!-- FOOTER -->
    @include('dashboard.partials.footer')
    @include('dashboard.partials.script')

</body>

</html>
