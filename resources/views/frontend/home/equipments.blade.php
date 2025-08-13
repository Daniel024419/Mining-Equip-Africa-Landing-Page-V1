<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.head')
    <title>Mining Equip Africa | Equipments</title>
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
            <h1 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Mining Equipment Solutions</h1>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}" class="text-light">Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-light">Products</a></li>
                <li class="breadcrumb-item active text-warning">Equipment</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Equipment Start -->
    <div class="container-fluid py-5 bg-dark">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <p class="text-uppercase text-warning fs-5 mb-0 fw-bold">INDUSTRY-LEADING EQUIPMENT</p>
                <h2 class="display-4 text-capitalize mb-3 text-white">Mining Machinery for African Operations</h2>
                <p class="text-light">Reliable equipment solutions for exploration, extraction, and material handling
                </p>
            </div>

            <div class="row g-4">
                @forelse ($equipments as $equipment)
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="{{ 0.2 + ($loop->index % 3) * 0.2 }}s">
                        <div class="equipment-item border border-warning rounded-4 overflow-hidden bg-dark h-100">
                            <div class="equipment-img position-relative">
                                <img  src="{{ asset('files/' . ($equipment->image ?? 'default.png')) }}"
                                    class="img-fluid w-100 transition-transform hover-scale" alt="{{ $equipment->title }}"
                                    style="height: 220px; object-fit: cover;"
                                    onerror="this.onerror=null; this.src='{{ asset('files/default.png') }}'">
                                    
                                <div
                                    class="equipment-badge bg-warning text-dark px-3 py-1 position-absolute top-0 end-0 m-3 rounded-pill fw-bold text-uppercase">
                                    {{ strtoupper($equipment->condition) }}
                                </div>
                            </div>
                            <div class="equipment-content p-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h3 class="text-warning mb-0">{{ Str::ucfirst($equipment->name) }}</h3>
                                    <div class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <ul class="text-light mb-4">
                                    <li>Category: {{ $equipment->category }}</li>
                                    <li>Year: {{ $equipment->year }}</li>
                                    <li>{{ Str::limit($equipment->description, 60) }}</li>
                                </ul>
                                <div class="d-flex justify-content-between align-items-center">
                                   <div class="d-flex align-items-center gap-2">
                                    <a href="{{ route('frontend.home.showEquiment', $equipment->id) }}"
                                        class="btn btn-outline-warning py-2 px-4">Details</a>

                                    <!-- Share Button -->
                                    <button class="btn btn-outline-warning py-2 px-4"
                                        onclick="openShareActions('{{ json_encode($equipment->id) }}')">
                                        <i class="fas fa-share-alt" id="shareIcon"></i> Share
                                    </button>
                                   </div>

                                    <span class="text-warning fw-bold">
                                        GHS
                                        {{ is_numeric($equipment->price) ? number_format($equipment->price, 2) : $equipment->price }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <h2 class="text-white">No {{ request('condition') }} equiment matching the condition is found</h2>
                @endforelse

                <!-- Pagination -->
                <div class="row mt-5 wow fadeInUp mt-3 justify-content-center" data-wow-delay="0.3s">
                    {{ $equipments->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    <!-- Equipment End -->


    <!-- Equipment Categories Start -->
    <div class="container-fluid bg-black py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s">
                <h2 class="display-4 text-capitalize mb-3 text-white">Equipment Categories</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="category-card bg-dark border border-warning rounded-4 p-4 text-center h-100">
                        <div class="bg-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
                            style="width: 80px; height: 80px;">
                            <i class="fas fa-hammer text-dark fa-3x"></i>
                        </div>
                        <h4 class="text-warning mb-3">Drilling Equipment</h4>
                        <ul class="text-light text-start">
                            <li>RC Drills</li>
                            <li>Diamond Core Rigs</li>
                            <li>Blast Hole Drills</li>
                            <li>Directional Drilling</li>
                        </ul>
                        <a href="#" class="btn btn-outline-warning mt-2">Explore</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="category-card bg-dark border border-warning rounded-4 p-4 text-center h-100">
                        <div class="bg-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
                            style="width: 80px; height: 80px;">
                            <i class="fas fa-truck-pickup text-dark fa-3x"></i>
                        </div>
                        <h4 class="text-warning mb-3">Hauling Equipment</h4>
                        <ul class="text-light text-start">
                            <li>Articulated Trucks</li>
                            <li>Rigid Haulers</li>
                            <li>Dump Trucks</li>
                            <li>Water Trucks</li>
                        </ul>
                        <a href="#" class="btn btn-outline-warning mt-2">Explore</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="category-card bg-dark border border-warning rounded-4 p-4 text-center h-100">
                        <div class="bg-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
                            style="width: 80px; height: 80px;">
                            <i class="fas fa-truck-monster text-dark fa-3x"></i>
                        </div>
                        <h4 class="text-warning mb-3">Excavation Equipment</h4>
                        <ul class="text-light text-start">
                            <li>Hydraulic Excavators</li>
                            <li>Wheel Loaders</li>
                            <li>Bulldozers</li>
                            <li>Backhoes</li>
                        </ul>
                        <a href="#" class="btn btn-outline-warning mt-2">Explore</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="category-card bg-dark border border-warning rounded-4 p-4 text-center h-100">
                        <div class="bg-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
                            style="width: 80px; height: 80px;">
                            <i class="fas fa-cogs text-dark fa-3x"></i>
                        </div>
                        <h4 class="text-warning mb-3">Support Equipment</h4>
                        <ul class="text-light text-start">
                            <li>Generators</li>
                            <li>Compressors</li>
                            <li>Light Towers</li>
                            <li>equipment Trucks</li>
                        </ul>
                        <a href="#" class="btn btn-outline-warning mt-2">Explore</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Equipment Categories End -->

    <!-- Footer Start -->
    @include('frontend.partials.footer')
    <!-- Footer End -->
    @include('frontend.home.partials.share-and-copy-equipment-to-clipboard')
    <!-- JavaScript Libraries -->
    @include('frontend.partials.script')
</body>

</html>
