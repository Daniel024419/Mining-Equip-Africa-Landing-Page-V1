<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.head')
    <title>Mining Equip Africa | Teams</title>
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
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Our Team</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-secondary">Team</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Team Start -->
    <div class="container-fluid team py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <p class="text-uppercase text-secondary fs-5 mb-0">Our Team</p>
                <h2 class="display-4 text-capitalize mb-3">Expert team members.</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="team-item border border-primary p-1">
                        <div class="team-border-style-1"></div>
                        <div class="team-border-style-2"></div>
                        <div class="team-border-style-3"></div>
                        <div class="team-border-style-4"></div>
                        <div class="team-img">
                            <img src="{{ asset('frontend/img/team-1.jpg')}}" class="img-fluid w-100" alt="">
                            <div class="team-icon d-flex justify-content-around">
                                <a class="btn btn-secondary btn-md-square text-white mx-3" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-secondary btn-md-square text-white me-3" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-secondary btn-md-square text-white me-3" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-secondary btn-md-square text-white me-3" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center border border-top-0 bg-white py-3">
                            <h4 class="mb-0">Masud Maria</h4>
                            <p class="mb-0">Foreman</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="team-item border border-primary p-1">
                        <div class="team-border-style-1"></div>
                        <div class="team-border-style-2"></div>
                        <div class="team-border-style-3"></div>
                        <div class="team-border-style-4"></div>
                        <div class="team-img">
                            <img src="{{ asset('frontend/img/team-2.jpg')}}" class="img-fluid w-100" alt="">
                            <div class="team-icon d-flex justify-content-around">
                                <a class="btn btn-secondary btn-md-square text-white mx-3" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-secondary btn-md-square text-white me-3" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-secondary btn-md-square text-white me-3" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-secondary btn-md-square text-white me-3" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center border border-top-0 bg-white py-3">
                            <h4 class="mb-0">Masud Maria</h4>
                            <p class="mb-0">Foreman</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="team-item border border-primary p-1">
                        <div class="team-border-style-1"></div>
                        <div class="team-border-style-2"></div>
                        <div class="team-border-style-3"></div>
                        <div class="team-border-style-4"></div>
                        <div class="team-img">
                            <img src="{{ asset('frontend/img/team-3.jpg')}}" class="img-fluid w-100" alt="">
                            <div class="team-icon d-flex justify-content-around">
                                <a class="btn btn-secondary btn-md-square text-white mx-3" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-secondary btn-md-square text-white me-3" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-secondary btn-md-square text-white me-3" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-secondary btn-md-square text-white me-3" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center border border-top-0 bg-white py-3">
                            <h4 class="mb-0">Masud Maria</h4>
                            <p class="mb-0">Foreman</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="team-item border border-primary p-1">
                        <div class="team-border-style-1"></div>
                        <div class="team-border-style-2"></div>
                        <div class="team-border-style-3"></div>
                        <div class="team-border-style-4"></div>
                        <div class="team-img">
                            <img src="{{ asset('frontend/img/team-4.jpg')}}" class="img-fluid w-100" alt="">
                            <div class="team-icon d-flex justify-content-around">
                                <a class="btn btn-secondary btn-md-square text-white mx-3" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-secondary btn-md-square text-white me-3" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-secondary btn-md-square text-white me-3" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-secondary btn-md-square text-white me-3" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center border border-top-0 bg-white py-3">
                            <h4 class="mb-0">Masud Maria</h4>
                            <p class="mb-0">Foreman</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->
    <!-- Footer Start -->
    @include('frontend.partials.footer')
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    @include('frontend.partials.script')
</body>

</html>
