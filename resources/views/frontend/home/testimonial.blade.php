<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.head')
    <title>Mining Equip Africa | Testimonial</title>
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
            <h4 class="mb-4 text-white display-4 wow fadeInDown" data-wow-delay="0.1s">Testimonial</h4>
            <ol class="mb-0 breadcrumb d-flex justify-content-center wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-secondary">Testimonial</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Testimonial Start -->
    <div class="py-5 container-fluid testimonial bg-dark">
        <div class="container py-5">
            <div class="pb-5 mx-auto text-center wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <p class="mb-0 text-uppercase text-warning fs-5 fw-bold">CLIENT FEEDBACK</p>
                <h2 class="mb-3 text-white display-4 text-capitalize">Trusted by Mining Leaders</h2>
                <p class="text-light">What African mining operations say about our equipment and services</p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.4s">
                <!-- Testimonial 1 -->
                <div class="p-4 border testimonial-item border-warning rounded-4 bg-dark">
                    <div class="position-relative">
                        <i class="fa fa-quote-right fa-2x text-warning position-absolute"
                            style="top: 20px; right: 20px;"></i>
                        <div class="pb-4 mb-4 border-bottom border-warning">
                            <p class="mb-0 text-light fs-5">"Mining Equip Africa's RC drilling rigs delivered 22% higher
                                productivity than previous contractors at our Ghana gold operation. Their 24/7 technical
                                support resolved issues before they impacted production."</p>
                        </div>
                        <div class="d-flex align-items-center flex-nowrap">
                            <div class="me-4">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWxeP0FYO40fLbYn1hS08ZASqlpf6K4boW4w&s"
                                    class="img-fluid rounded-circle"
                                    style="width: 80px; height: 80px; object-fit: cover;" alt="Mining Executive">
                            </div>
                            <div class="d-block">
                                <h4 class="mb-1 text-warning">Kwame Asante</h4>
                                <p class="pb-2 m-0 text-light">Operations Manager, Golden Star Resources</p>
                                <div class="d-flex pe-5">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="p-4 border testimonial-item border-warning rounded-4 bg-dark">
                    <div class="position-relative">
                        <i class="fa fa-quote-right fa-2x text-warning position-absolute"
                            style="top: 20px; right: 20px;"></i>
                        <div class="pb-4 mb-4 border-bottom border-warning">
                            <p class="mb-0 text-light fs-5">"The diamond core drill rigs performed flawlessly in our
                                Zambian copper mine's underground conditions. MEA's maintenance program kept downtime
                                below 2% - exceptional for African operations."</p>
                        </div>
                        <div class="d-flex align-items-center flex-nowrap">
                            <div class="me-4">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWxeP0FYO40fLbYn1hS08ZASqlpf6K4boW4w&s"
                                    class="img-fluid rounded-circle"
                                    style="width: 80px; height: 80px; object-fit: cover;" alt="Mining Engineer">
                            </div>
                            <div class="d-block">
                                <h4 class="mb-1 text-warning">Thandiwe Nkosi</h4>
                                <p class="pb-2 m-0 text-light">Chief Engineer, Lubambe Copper Mine</p>
                                <div class="d-flex pe-5">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star-half-alt text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="p-4 border testimonial-item border-warning rounded-4 bg-dark">
                    <div class="position-relative">
                        <i class="fa fa-quote-right fa-2x text-warning position-absolute"
                            style="top: 20px; right: 20px;"></i>
                        <div class="pb-4 mb-4 border-bottom border-warning">
                            <p class="mb-0 text-light fs-5">"After training 63 operators through MEA's certification
                                program, we've had zero equipment-related accidents in 18 months. Their safety-first
                                approach transformed our culture."</p>
                        </div>
                        <div class="d-flex align-items-center flex-nowrap">
                            <div class="me-4">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWxeP0FYO40fLbYn1hS08ZASqlpf6K4boW4w&s"
                                    class="img-fluid rounded-circle"
                                    style="width: 80px; height: 80px; object-fit: cover;" alt="Safety Officer">
                            </div>
                            <div class="d-block">
                                <h4 class="mb-1 text-warning">David Okafor</h4>
                                <p class="pb-2 m-0 text-light">Safety Director, Randgold Resources</p>
                                <div class="d-flex pe-5">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="far fa-star text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 4 -->
                <div class="p-4 border testimonial-item border-warning rounded-4 bg-dark">
                    <div class="position-relative">
                        <i class="fa fa-quote-right fa-2x text-warning position-absolute"
                            style="top: 20px; right: 20px;"></i>
                        <div class="pb-4 mb-4 border-bottom border-warning">
                            <p class="mb-0 text-light fs-5">"Their logistics team navigated customs in 3 countries to
                                deliver our blast drill rigs 2 weeks ahead of schedule. That's African mining expertise
                                you can't fake."</p>
                        </div>
                        <div class="d-flex align-items-center flex-nowrap">
                            <div class="me-4">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWxeP0FYO40fLbYn1hS08ZASqlpf6K4boW4w&s"
                                    class="img-fluid rounded-circle"
                                    style="width: 80px; height: 80px; object-fit: cover;" alt="Logistics Manager">
                            </div>
                            <div class="d-block">
                                <h4 class="mb-1 text-warning">Amina Diallo</h4>
                                <p class="pb-2 m-0 text-light">Supply Chain VP, Sahel Mining Group</p>
                                <div class="d-flex pe-5">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Footer Start -->
    @include('frontend.partials.footer')
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    @include('frontend.partials.script')
</body>

</html>
