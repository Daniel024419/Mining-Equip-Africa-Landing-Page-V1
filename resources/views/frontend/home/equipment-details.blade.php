<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.head')
    <title>{{ $equipment->name }} | Mining Equip Africa</title>
</head>

<body>

    <!-- Spinner Start -->
    @include('frontend.partials.spinner')
    <!-- Spinner End -->

    <!-- Topbar Start -->
    @include('frontend.partials.top-bar')
    <!-- Topbar End -->

    <!-- Navbar & Hero Start -->
    @include('frontend.partials.nav-bar')
    <!-- Navbar & Hero End -->

    <!-- Breadcrumb Start -->
    <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)), url('{{ asset('frontend/img/mining-equipment-banner.jpg') }}') center/cover no-repeat;">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h1 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ $equipment->name }}</h1>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}" class="text-light">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('frontend.home.equipments', 'all') }}"
                        class="text-light">Equipment</a></li>
                <li class="breadcrumb-item active text-warning">{{ $equipment->name }}</li>
            </ol>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Equipment Details Start -->
    <div class="container py-5 bg-dark rounded-4 my-5">
        <!-- Back Button -->
            <div class="mb-4">
                <a href="{{ route('frontend.home.equipments','all') }}" class="btn btn-secondary py-2 px-4">
                    <i class="fas fa-arrow-left me-2"></i> Back to Equipments
                </a>

                <!-- Share Button -->
                <button class="btn btn-primary py-2 px-4" onclick="openShareActions('{{ json_encode($equipment->id) }}')">
                    <i class="fas fa-share-alt" id="shareIcon"></i> Share Equipment
                </button>
            </div>

        <div class="row g-4">
            <!-- Image -->
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                <img src="{{ asset('files/' . $equipment->image) }}"alt="{{ $equipment->name }}"
                    class="img-fluid rounded-4 w-100" style="height: 400px; object-fit: cover;">
                <div class="equipment-badge bg-warning text-dark px-3 py-1 rounded-pill fw-bold mt-3 text-uppercase"
                    style="width: fit-content;">
                    {{ $equipment->condition }}
                </div>
            </div>

            <!-- Details -->
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.4s">
                <h2 class="text-warning mb-3">{{ Str::ucfirst($equipment->name) }}</h2>
                <p class="text-light mb-4">{{ $equipment->description }}</p>

                <ul class="list-group list-group-flush mb-4">
                    <li class="list-group-item bg-dark text-white border-warning"><strong>Category:</strong>
                        {{ $equipment->category }}</li>
                    <li class="list-group-item bg-dark text-white border-warning"><strong>Condition:</strong>
                        {{ ucfirst($equipment->condition) }}</li>
                    <li class="list-group-item bg-dark text-white border-warning"><strong>Year:</strong>
                        {{ $equipment->year }}</li>
                    <li class="list-group-item bg-dark text-white border-warning"><strong>Price:</strong>
                        {{ is_numeric($equipment->price) ? 'GHS ' . number_format($equipment->price, 2) : $equipment->price }}
                    </li>
                </ul>

                <a href="{{ route('frontend.home.contacts') }}" class="btn btn-warning py-3 px-5 fw-bold text-dark">
                    <i class="fas fa-phone-alt me-2"></i> Contact Sales
                </a>

                <!-- Share Button -->
                <button class="btn btn-success py-3 px-5 fw-bold text-dark"
                    onclick="openShareActions('{{ json_encode($equipment->id) }}')">
                    <i class="fas fa-share-alt me-2" id="shareIcon"></i> Share
                </button>

            </div>
        </div>
    </div>
    <!-- Equipment Details End -->

    <!-- Footer Start -->
    @include('frontend.partials.footer')
    <!-- Footer End -->

    @include('frontend.home.partials.share-and-copy-equipment-to-clipboard')

    <!-- JavaScript Libraries -->
    @include('frontend.partials.script')

</body>

</html>
