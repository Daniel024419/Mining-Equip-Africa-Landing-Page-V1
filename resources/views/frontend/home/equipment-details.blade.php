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
        <div class="container py-5 text-center" style="max-width: 900px;">
            <h1 class="mb-4 text-white display-4 wow fadeInDown" data-wow-delay="0.1s">{{ $equipment->name }}</h1>
            <ol class="mb-0 breadcrumb d-flex justify-content-center wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}" class="text-light">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('frontend.home.equipments', 'all') }}"
                        class="text-light">Equipment</a></li>
                <li class="breadcrumb-item active text-warning">{{ $equipment->name }}</li>
            </ol>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Equipment Details Start -->
    <div class="container py-5 my-5 bg-dark rounded-4">
        <!-- Back Button -->
        <div class="mb-4">
            <a href="{{ route('frontend.home.equipments', 'all') }}" class="px-4 py-2 btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i> Back to Equipments
            </a>

            <!-- Share Button -->
            <button class="px-4 py-2 btn btn-primary" onclick="openShareActions('{{ json_encode($equipment->id) }}')">
                <i class="fas fa-share-alt" id="shareIcon"></i> Share Equipment
            </button>
        </div>

        <div class="row g-4">
            <!-- Image -->
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">

                <img src="{{ asset('files/' . ($equipment->image ?? 'default.png')) }}"
                    class="transition-transform img-fluid w-100 hover-scale" alt="{{ $equipment->title }}"
                    style="height: 400px; object-fit: cover;"
                    onerror="this.onerror=null; this.src='{{ asset('files/default.png') }}'">
                <div class="px-3 py-1 mt-3 equipment-badge bg-warning text-dark rounded-pill fw-bold text-uppercase"
                    style="width: fit-content;">
                    {{ $equipment->condition }}
                </div>
            </div>

            <!-- Details -->
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.4s">
                <h2 class="mb-3 text-warning">{{ Str::ucfirst($equipment->name) }}</h2>
                <p class="mb-4 text-light">{{ $equipment->description }}</p>

                <ul class="mb-4 list-group list-group-flush">
                    <li class="text-white list-group-item bg-dark border-warning"><strong>Category:</strong>
                        {{ $equipment->category }}</li>
                    <li class="text-white list-group-item bg-dark border-warning"><strong>Condition:</strong>
                        {{ ucfirst($equipment->condition) }}</li>
                    <li class="text-white list-group-item bg-dark border-warning"><strong>Year:</strong>
                        {{ $equipment->year }}</li>
                    <li class="text-white list-group-item bg-dark border-warning"><strong>Price:</strong>
                        {{ is_numeric($equipment->price) ? 'GHS ' . number_format($equipment->price, 2) : $equipment->price }}
                    </li>

                    <li class="text-white list-group-item bg-dark border-warning"><strong>Price:</strong>
                        USD
                        {{ number_format(CurrencyConverter::convert($equipment->price)->from('GHS')->to('USD')->get(), 2) }}
                    </li>
                    <li class="text-white list-group-item bg-dark border-warning"><strong>Price:</strong>
                        CFA
                        {{ number_format(CurrencyConverter::convert($equipment->price)->from('GHS')->to('XOF')->get(), 2) }}
                    </li>
                </ul>

                <a href="{{ route('frontend.home.contacts') }}" class="px-5 py-3 btn btn-warning fw-bold text-dark">
                    <i class="fas fa-phone-alt me-2"></i> Contact Sales
                </a>

                <!-- Share Button -->
                <button class="px-5 py-3 btn btn-success fw-bold text-dark"
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
