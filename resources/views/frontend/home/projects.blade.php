<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.head')
    <title>Mining Equip Africa | Projects</title>
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
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Our Projects</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-secondary">Project</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Projects Start -->
    <div class="container-fluid project py-5 bg-dark">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <p class="text-uppercase text-warning fs-5 mb-0 fw-bold">OUR WORK</p>
                <h2 class="display-4 text-capitalize mb-3 text-white">Recent Mining Projects</h2>
                <p class="text-light">Successful equipment deployments and drilling operations across Africa</p>
            </div>
            <div class="row g-5">
                <!-- Project 1: Gold Mining -->
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="project-item border border-warning rounded-4 overflow-hidden bg-dark">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <div class="project-img h-100">
                                    <img src="{{ asset('frontend/img/gold-mining-project.jpg') }}"
                                        class="img-fluid h-100 w-100" alt="Gold Mining Project"
                                        style="object-fit: cover;">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="project-content p-4">
                                    <p class="fs-5 text-warning mb-2">Gold Mining</p>
                                    <a href="#" class="h4 text-white d-block mb-3">Obuasi Gold Fields
                                        Expansion</a>
                                    <p class="text-light mb-4">Deployed 12 RC drilling rigs with modified laterite soil
                                        attachments, achieving 98% uptime over 6-month contract.</p>
                                    <div class="d-flex flex-wrap">
                                        <span class="badge bg-warning text-dark me-2 mb-2">RC Drilling</span>
                                        <span class="badge bg-warning text-dark me-2 mb-2">Equipment Lease</span>
                                        <span class="badge bg-warning text-dark mb-2">Operator Training</span>
                                    </div>
                                    <a class="btn btn-warning mt-3 py-2 px-4 fw-bold text-dark" href="#">
                                        <i class="fas fa-hard-hat me-2"></i> Case Study
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project 2: Copper Mining -->
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="project-item border border-warning rounded-4 overflow-hidden bg-dark">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <div class="project-img h-100">
                                    <img src="{{ asset('frontend/img/copper-mining-project.jpg') }}"
                                        class="img-fluid h-100 w-100" alt="Copper Mining Project"
                                        style="object-fit: cover;">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="project-content p-4">
                                    <p class="fs-5 text-warning mb-2">Copper Mining</p>
                                    <a href="#" class="h4 text-white d-block mb-3">Lubambe Underground
                                        Operations</a>
                                    <p class="text-light mb-4">Provided diamond core drilling equipment and maintenance
                                        team for 24/7 underground operations in Zambia.</p>
                                    <div class="d-flex flex-wrap">
                                        <span class="badge bg-warning text-dark me-2 mb-2">Diamond Drilling</span>
                                        <span class="badge bg-warning text-dark me-2 mb-2">Underground</span>
                                        <span class="badge bg-warning text-dark mb-2">Maintenance</span>
                                    </div>
                                    <a class="btn btn-warning mt-3 py-2 px-4 fw-bold text-dark" href="#">
                                        <i class="fas fa-chart-line me-2"></i> Results
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project 3: Iron Ore -->
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="project-item border border-warning rounded-4 overflow-hidden bg-dark">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <div class="project-img h-100">
                                    <img src="{{ asset('frontend/img/iron-ore-project.jpg') }}"
                                        class="img-fluid h-100 w-100" alt="Iron Ore Project" style="object-fit: cover;">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="project-content p-4">
                                    <p class="fs-5 text-warning mb-2">Iron Ore</p>
                                    <a href="#" class="h4 text-white d-block mb-3">Simandou Range Blast
                                        Drilling</a>
                                    <p class="text-light mb-4">Custom blast hole rigs for Guinea's high-altitude
                                        operations, increasing production by 35% over previous contractor.</p>
                                    <div class="d-flex flex-wrap">
                                        <span class="badge bg-warning text-dark me-2 mb-2">Blast Drilling</span>
                                        <span class="badge bg-warning text-dark me-2 mb-2">High Altitude</span>
                                        <span class="badge bg-warning text-dark mb-2">Custom Rigs</span>
                                    </div>
                                    <a class="btn btn-warning mt-3 py-2 px-4 fw-bold text-dark" href="#">
                                        <i class="fas fa-mountain me-2"></i> Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project 4: Training Program -->
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="project-item border border-warning rounded-4 overflow-hidden bg-dark">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <div class="project-img h-100">
                                    <img src="{{ asset('frontend/img/training-project.jpg') }}"
                                        class="img-fluid h-100 w-100" alt="Training Project"
                                        style="object-fit: cover;">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="project-content p-4">
                                    <p class="fs-5 text-warning mb-2">Safety Training</p>
                                    <a href="#" class="h4 text-white d-block mb-3">West Africa Operator
                                        Certification</a>
                                    <p class="text-light mb-4">Certified 142 heavy equipment operators across Ghana,
                                        Mali and Burkina Faso to international safety standards.</p>
                                    <div class="d-flex flex-wrap">
                                        <span class="badge bg-warning text-dark me-2 mb-2">Certification</span>
                                        <span class="badge bg-warning text-dark me-2 mb-2">Safety</span>
                                        <span class="badge bg-warning text-dark mb-2">Multi-Country</span>
                                    </div>
                                    <a class="btn btn-warning mt-3 py-2 px-4 fw-bold text-dark" href="#">
                                        <i class="fas fa-user-graduate me-2"></i> Program
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CTA Button -->
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                    <a class="btn btn-outline-warning py-3 px-5 fw-bold" href="#">
                        <i class="fas fa-folder-open me-2"></i> View All Projects
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Projects End -->

    <!-- Footer Start -->
    @include('frontend.partials.footer')
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    @include('frontend.partials.script')
</body>

</html>
