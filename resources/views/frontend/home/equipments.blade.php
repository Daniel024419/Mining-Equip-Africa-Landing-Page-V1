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
                <!-- Drilling Equipment -->
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="equipment-item border border-warning rounded-4 overflow-hidden bg-dark h-100">
                        <div class="equipment-img">
                            <img src="{{ asset('frontend/img/drilling-rig.jpg') }}" class="img-fluid w-100"
                                alt="RC Drilling Rig" style="height: 250px; object-fit: cover;">
                            <div
                                class="equipment-badge bg-warning text-dark px-3 py-1 position-absolute top-0 end-0 m-3 rounded-pill fw-bold">
                                NEW
                            </div>
                        </div>
                        <div class="equipment-content p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h3 class="text-warning mb-0">RC Drilling Rigs</h3>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                            <ul class="text-light mb-4">
                                <li>Depth capacity: 150-300m</li>
                                <li>Fuel-efficient diesel engines</li>
                                <li>Laterite soil attachments</li>
                                <li>24-month warranty</li>
                            </ul>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-outline-warning py-2 px-4">View Models</a>
                                <span class="text-warning fw-bold">From GHS 120,000</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Excavators -->
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="equipment-item border border-warning rounded-4 overflow-hidden bg-dark h-100">
                        <div class="equipment-img">
                            <img src="{{ asset('frontend/img/excavator.jpg') }}" class="img-fluid w-100"
                                alt="Mining Excavator" style="height: 250px; object-fit: cover;">
                            <div
                                class="equipment-badge bg-warning text-dark px-3 py-1 position-absolute top-0 end-0 m-3 rounded-pill fw-bold">
                                USED
                            </div>
                        </div>
                        <div class="equipment-content p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h3 class="text-warning mb-0">Hydraulic Excavators</h3>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                            <ul class="text-light mb-4">
                                <li>20-50 ton capacity</li>
                                <li>CAT & Komatsu models</li>
                                <li>Fully refurbished</li>
                                <li>6-month warranty</li>
                            </ul>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-outline-warning py-2 px-4">Inventory</a>
                                <span class="text-warning fw-bold">From GHS 85,000</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Haul Trucks -->
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="equipment-item border border-warning rounded-4 overflow-hidden bg-dark h-100">
                        <div class="equipment-img">
                            <img src="{{ asset('frontend/img/haul-truck.jpg') }}" class="img-fluid w-100"
                                alt="Mining Haul Truck" style="height: 250px; object-fit: cover;">
                            <div
                                class="equipment-badge bg-warning text-dark px-3 py-1 position-absolute top-0 end-0 m-3 rounded-pill fw-bold">
                                LEASE
                            </div>
                        </div>
                        <div class="equipment-content p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h3 class="text-warning mb-0">Articulated Haul Trucks</h3>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <ul class="text-light mb-4">
                                <li>30-40 ton payload</li>
                                <li>All-terrain capability</li>
                                <li>Low-hour units available</li>
                                <li>Full maintenance packages</li>
                            </ul>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-outline-warning py-2 px-4">Lease Options</a>
                                <span class="text-warning fw-bold">GHS 8,500/month</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Equipment Rows -->
                <!-- Row 2 -->
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="equipment-item border border-warning rounded-4 overflow-hidden bg-dark h-100">
                        <!-- Diamond Core Drilling Equipment -->
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="equipment-item border border-warning rounded-4 overflow-hidden bg-dark h-100">
                        <!-- Loaders -->
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="equipment-item border border-warning rounded-4 overflow-hidden bg-dark h-100">
                        <!-- Blast Hole Drills -->
                    </div>
                </div>

                <!-- CTA Button -->
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                    <a class="btn btn-warning py-3 px-5 mt-4 fw-bold text-dark" href="#">
                        <i class="fas fa-hard-hat me-2"></i> View Full Equipment Catalog
                    </a>
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
                            <li>Service Trucks</li>
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

    <!-- JavaScript Libraries -->
    @include('frontend.partials.script')
</body>

</html>
