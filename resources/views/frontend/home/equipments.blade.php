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
        <div class="container py-5 text-center" style="max-width: 900px;">
            <h1 class="mb-4 text-white display-4 wow fadeInDown" data-wow-delay="0.1s">Mining Equipment Solutions</h1>
            <ol class="mb-0 breadcrumb d-flex justify-content-center wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}" class="text-light">Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-light">Products</a></li>
                <li class="breadcrumb-item active text-warning">Equipment</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Equipment Start -->
    <div class="py-5 container-fluid bg-dark">
        <div class="container py-5">
            <div class="pb-5 mx-auto text-center wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <p class="mb-0 text-uppercase text-warning fs-5 fw-bold">INDUSTRY-LEADING EQUIPMENT</p>
                <h2 class="mb-3 text-white display-4 text-capitalize">Mining Machinery for African Operations</h2>
                <p class="text-light">Reliable equipment solutions for exploration, extraction, and material handling
                </p>
            </div>

            <div class="row g-4">
                @forelse ($equipments as $equipment)
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="{{ 0.2 + ($loop->index % 3) * 0.2 }}s">
                        <div class="overflow-hidden border equipment-item border-warning rounded-4 bg-dark h-100">
                            <div class="equipment-img position-relative">
                                <img src="{{ asset('files/' . ($equipment->image ?? 'default.png')) }}"
                                    class="transition-transform img-fluid w-100 hover-scale"
                                    alt="{{ $equipment->title }}" style="height: 220px; object-fit: cover;"
                                    onerror="this.onerror=null; this.src='{{ asset('files/default.png') }}'">

                                <div
                                    class="top-0 px-3 py-1 m-3 equipment-badge bg-warning text-dark position-absolute end-0 rounded-pill fw-bold text-uppercase">
                                    {{ strtoupper($equipment->condition) }}
                                </div>
                            </div>
                            <div class="p-4 equipment-content">
                                <div class="mb-3 justify-content-between align-items-center">
                                    <h3 class="mb-0 text-warning">{{ Str::ucfirst($equipment->name) }}</h3>
                                    <br>
                                    <div class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <ul class="mb-4 text-light">
                                    <li>Category: {{ $equipment->category }}</li>
                                    <li>Year: {{ $equipment->year }}</li>
                                    <li>{{ Str::limit($equipment->description, 60) }}</li>
                                </ul>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="gap-2 d-flex align-items-center">
                                        <a href="{{ route('frontend.home.showEquiment', $equipment->id) }}"
                                            class="px-3 py-2 btn btn-outline-warning btn-sm"
                                            aria-label="View details for {{ $equipment->name }}">Details</a>

                                        <div class="btn-group" role="group"
                                            aria-label="Share {{ $equipment->name }}">
                                            <button type="button" class="px-3 py-2 btn btn-outline-warning btn-sm"
                                                onclick="openShareActions('{{ json_encode($equipment->id) }}')"
                                                aria-label="Share {{ $equipment->name }}">
                                                <i class="fas fa-share-alt"></i>
                                                <span class="d-none d-md-inline ms-2">Share</span>
                                            </button>
                                            <a href="mailto:?subject={{ urlencode($equipment->name) }}&body={{ urlencode(route('frontend.home.showEquiment', $equipment->id)) }}"
                                                class="px-3 py-2 btn btn-outline-warning btn-sm d-none d-md-inline"
                                                title="Email link to {{ $equipment->name }}">
                                                <i class="fas fa-envelope"></i>
                                            </a>
                                        </div>
                                    </div> 
                                </div> 
                                <br>
                                <span class="text-warning fw-bold ms-3">
                                 GHS {{ is_numeric($equipment->price) ? number_format($equipment->price, 2) : $equipment->price }}
                                </span>
                                <span class="text-warning fw-bold ms-3">
                                 USD  {{number_format(CurrencyConverter::convert($equipment->price)->from('GHS')->to('USD')->get(), 2) }}
                                </span>
                                <span class="text-warning fw-bold ms-3">
                                 CFA  {{ number_format(CurrencyConverter::convert($equipment->price)->from('GHS')->to('XOF')->get(), 2) }}
                                </span>
                            </div>
                        </div>
                    </div>

                @empty
                    <h2 class="text-white">No {{ request('condition') }} equiment matching the condition is found</h2>
                @endforelse

                <!-- Pagination -->
                <div class="mt-5 row wow fadeInUp justify-content-center" data-wow-delay="0.3s">
                    {{ $equipments->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    <!-- Equipment End -->


    <!-- Equipment Categories Start -->
    <div class="py-5 bg-black container-fluid">
        <div class="container py-5">
            <div class="pb-5 mx-auto text-center wow fadeInUp" data-wow-delay="0.2s">
                <h2 class="mb-3 text-white display-4 text-capitalize">Equipment Categories</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="p-4 text-center border category-card bg-dark border-warning rounded-4 h-100">
                        <div class="mb-4 bg-warning rounded-circle d-inline-flex align-items-center justify-content-center"
                            style="width: 80px; height: 80px;">
                            <i class="fas fa-hammer text-dark fa-3x"></i>
                        </div>
                        <h4 class="mb-3 text-warning">Drilling Equipment</h4>
                        <ul class="text-light text-start">
                            <li>RC Drills</li>
                            <li>Diamond Core Rigs</li>
                            <li>Blast Hole Drills</li>
                            <li>Directional Drilling</li>
                        </ul>
                        <a href="#" class="mt-2 btn btn-outline-warning">Explore</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="p-4 text-center border category-card bg-dark border-warning rounded-4 h-100">
                        <div class="mb-4 bg-warning rounded-circle d-inline-flex align-items-center justify-content-center"
                            style="width: 80px; height: 80px;">
                            <i class="fas fa-truck-pickup text-dark fa-3x"></i>
                        </div>
                        <h4 class="mb-3 text-warning">Hauling Equipment</h4>
                        <ul class="text-light text-start">
                            <li>Articulated Trucks</li>
                            <li>Rigid Haulers</li>
                            <li>Dump Trucks</li>
                            <li>Water Trucks</li>
                        </ul>
                        <a href="#" class="mt-2 btn btn-outline-warning">Explore</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="p-4 text-center border category-card bg-dark border-warning rounded-4 h-100">
                        <div class="mb-4 bg-warning rounded-circle d-inline-flex align-items-center justify-content-center"
                            style="width: 80px; height: 80px;">
                            <i class="fas fa-truck-monster text-dark fa-3x"></i>
                        </div>
                        <h4 class="mb-3 text-warning">Excavation Equipment</h4>
                        <ul class="text-light text-start">
                            <li>Hydraulic Excavators</li>
                            <li>Wheel Loaders</li>
                            <li>Bulldozers</li>
                            <li>Backhoes</li>
                        </ul>
                        <a href="#" class="mt-2 btn btn-outline-warning">Explore</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="p-4 text-center border category-card bg-dark border-warning rounded-4 h-100">
                        <div class="mb-4 bg-warning rounded-circle d-inline-flex align-items-center justify-content-center"
                            style="width: 80px; height: 80px;">
                            <i class="fas fa-cogs text-dark fa-3x"></i>
                        </div>
                        <h4 class="mb-3 text-warning">Support Equipment</h4>
                        <ul class="text-light text-start">
                            <li>Generators</li>
                            <li>Compressors</li>
                            <li>Light Towers</li>
                            <li>equipment Trucks</li>
                        </ul>
                        <a href="#" class="mt-2 btn btn-outline-warning">Explore</a>
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
