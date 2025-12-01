<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.head')
    <title>Mining Equip Africa | Features</title>
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
        <div class="container py-5 text-center" style="max-width: 900px;">
            <h4 class="mb-4 text-white display-4 wow fadeInDown" data-wow-delay="0.1s">Our Features</h4>
            <ol class="mb-0 breadcrumb d-flex justify-content-center wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-secondary">Festures</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Features Start -->
    <div class="py-5 container-fluid feature bg-light">
        <div class="container py-5">
            <div class="pb-5 mx-auto text-center wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <p class="mb-2 text-uppercase text-primary fs-5">WHY CHOOSE US</p>
                <p class="lead">Trusted by mining operations across the continent for quality and reliability</p>
            </div>
            <div class="row g-4">
                <!-- Feature 1 -->
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div
                        class="p-5 text-center transition-all bg-white shadow-sm feature-item rounded-4 h-100 hover-shadow">
                        <div class="p-4 mb-4 feature-icon bg-primary-light d-inline-flex rounded-circle">
                            <i class="fas fa-hard-hat text-primary fa-4x"></i>
                        </div>
                        <h4 class="mb-3">Mining-Specialized Expertise</h4>
                        <p class="mb-0">Our team comprises certified mining engineers and equipment specialists with
                            15+ years of African mining experience, ensuring you get the right solutions for your
                            specific needs.</p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div
                        class="p-5 text-center transition-all bg-white shadow-sm feature-item rounded-4 h-100 hover-shadow">
                        <div class="p-4 mb-4 feature-icon bg-primary-light d-inline-flex rounded-circle">
                            <i class="fas fa-check-circle text-primary fa-4x"></i>
                        </div>
                        <h4 class="mb-3">Rigorous Quality Assurance</h4>
                        <p class="mb-0">All equipment undergoes 152-point inspection and certification process. We
                            only source from OEM-approved manufacturers and refurbishment centers.</p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div
                        class="p-5 text-center transition-all bg-white shadow-sm feature-item rounded-4 h-100 hover-shadow">
                        <div class="p-4 mb-4 feature-icon bg-primary-light d-inline-flex rounded-circle">
                            <i class="fas fa-truck text-primary fa-4x"></i>
                        </div>
                        <h4 class="mb-3">Pan-African Logistics Network</h4>
                        <p class="mb-0">Our established transport partnerships ensure timely delivery to any mine site
                            across Africa, with customs clearance handled by our in-house experts.</p>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div
                        class="p-5 text-center transition-all bg-white shadow-sm feature-item rounded-4 h-100 hover-shadow">
                        <div class="p-4 mb-4 feature-icon bg-primary-light d-inline-flex rounded-circle">
                            <i class="fas fa-hand-holding-usd text-primary fa-4x"></i>
                        </div>
                        <h4 class="mb-3">Flexible Financing Options</h4>
                        <p class="mb-0">We offer lease-to-own arrangements, equipment financing, and trade-in programs
                            to help you acquire machinery without straining capital budgets.</p>
                    </div>
                </div>

                <!-- Feature 5 -->
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div
                        class="p-5 text-center transition-all bg-white shadow-sm feature-item rounded-4 h-100 hover-shadow">
                        <div class="p-4 mb-4 feature-icon bg-primary-light d-inline-flex rounded-circle">
                            <i class="fas fa-cogs text-primary fa-4x"></i>
                        </div>
                        <h4 class="mb-3">Comprehensive After-Sales Support</h4>
                        <p class="mb-0">24/7 technical support, on-site maintenance teams, and guaranteed parts
                            availability across our regional service centers.</p>
                    </div>
                </div>

                <!-- Feature 6 -->
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div
                        class="p-5 text-center transition-all bg-white shadow-sm feature-item rounded-4 h-100 hover-shadow">
                        <div class="p-4 mb-4 feature-icon bg-primary-light d-inline-flex rounded-circle">
                            <i class="fas fa-chart-line text-primary fa-4x"></i>
                        </div>
                        <h4 class="mb-3">Mining Productivity Focus</h4>
                        <p class="mb-0">We don't just sell equipment - we provide total productivity solutions with
                            operator training and performance optimization consulting.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->

    <style>
        .bg-primary-light {
            background-color: rgba(13, 110, 253, 0.1);
        }

        .hover-shadow {
            transition: all 0.3s ease;
        }

        .hover-shadow:hover {
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.1) !important;
            transform: translateY(-5px);
        }

        .feature-icon {
            transition: transform 0.3s ease;
        }

        .feature-item:hover .feature-icon {
            transform: scale(1.1);
        }
    </style>

    <!-- Footer Start -->
    @include('frontend.partials.footer')
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    @include('frontend.partials.script')
</body>

</html>
