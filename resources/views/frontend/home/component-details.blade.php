<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.head')
    <title>Mining Equip Africa | {{ $component->name }}</title>
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

    <!-- Modal Search Start -->
    @include('frontend.partials.search-modal')
    <!-- Modal Search End -->

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('{{ asset('frontend/img/mining-equipment-banner.jpg') }}') center/cover no-repeat;">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h1 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Component Details</h1>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}" class="text-light">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('frontend.home.components') }}"
                        class="text-light">Components</a></li>
                <li class="breadcrumb-item active text-warning">{{ $component->name }}</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Component Detail Start -->
    <div class="container-fluid py-5 bg-dark">
        <div class="container py-5">
            <!-- Back Button and Share Button -->
            <div class="mb-4">
                <a href="{{ route('frontend.home.components') }}" class="btn btn-outline-warning py-2 px-4">
                    <i class="fas fa-arrow-left me-2"></i> Back to Components
                </a>

                <!-- Share Button -->
                <button class="btn btn-outline-warning py-2 px-4 ms-2"
                    onclick="openShareActions('{{ json_encode($component->id) }}')">
                    <i class="fas fa-share-alt" id="shareIcon"></i> Share Component
                </button>
            </div>

            <div class="row g-4">
                <!-- Component Images -->
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="position-relative">
                        @if ($component->images->isNotEmpty())
                            <div id="componentCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($component->images as $key => $image)
                                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                            <img src="{{ asset('files/' . $image->path) }}" class="d-block w-100"
                                                alt="{{ $component->name }}" style="height: 400px; object-fit: cover;"
                                                onerror="this.onerror=null; this.src='{{ asset('files/default.png') }}'">
                                        </div>
                                    @endforeach
                                </div>
                                @if ($component->images->count() > 1)
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#componentCarousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#componentCarousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                @endif
                            </div>
                        @else
                            <img src="{{ asset('files/default.png') }}" class="img-fluid w-100"
                                alt="{{ $component->name }}" style="height: 400px; object-fit: cover;">
                        @endif
                    </div>
                </div>

                <!-- Component Details -->
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="h-100 bg-dark p-4 border border-warning rounded-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="text-warning mb-0">{{ $component->name }}</h2>
                            <span class="bg-warning text-dark px-3 py-1 rounded-pill fw-bold">
                                {{ strtoupper($component->condition) }}
                            </span>
                        </div>

                        <div class="mb-4">
                            <h4 class="text-light mb-3">Specifications:</h4>
                            <ul class="list-unstyled text-light">
                                <li class="mb-2"><i class="fas fa-check text-warning me-2"></i>
                                    <strong>Category:</strong> {{ $component->category }}</li>
                                <li class="mb-2"><i class="fas fa-check text-warning me-2"></i> <strong>Equipment
                                        Type:</strong> {{ $component->equipment_type }}</li>
                                <li class="mb-2"><i class="fas fa-check text-warning me-2"></i>
                                    <strong>Model:</strong> {{ $component->model ?? 'Not specified' }}</li>
                                <li class="mb-2"><i class="fas fa-check text-warning me-2"></i>
                                    <strong>Manufacturer:</strong> {{ $component->manufacturer ?? 'Not specified' }}
                                </li>
                            </ul>
                        </div>

                        <div class="mb-4">
                            <h4 class="text-light mb-3">Description:</h4>
                            <p class="text-light">{{ $component->description }}</p>
                        </div>

                        <div class="mb-4">
                            <h4 class="text-light mb-3">Features:</h4>
                            <ul class="list-unstyled text-light">
                                @foreach (explode("\n", $component->features ?? '') as $feature)
                                    @if (trim($feature))
                                        <li class="mb-2"><i class="fas fa-star text-warning me-2"></i>
                                            {{ trim($feature) }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <h3 class="text-warning mb-0">Price: GHS {{ number_format($component->price, 2) }}</h3>
                            <a href="#inquiry" class="btn btn-warning py-2 px-4">Request Quote</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Component Detail End -->

    <!-- Footer Start -->
    @include('frontend.partials.footer')
    <!-- Footer End -->
    @include('frontend.home.partials.share-and-copy-components-to-clipboard')
    <!-- JavaScript Libraries -->
    @include('frontend.partials.script')
</body>

</html>
