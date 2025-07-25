<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.head')
    <title>Mining Equip Africa | Services</title>
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
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Services</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-secondary">Services</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Services Start -->
    <div class="container-fluid service bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <p class="text-uppercase text-secondary fs-5 mb-0">Our Services</p>
                <h2 class="display-4 text-capitalize mb-3">our service is creative, & decent</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="{{ asset('frontend/img/service-1.jpg')}}" class="img-fluid w-100" alt="Image">
                        </div>
                        <div class="service-content text-center p-4">
                            <div class="bg-secondary btn-xl-square mx-auto" style="width: 120px; height: 120px;">
                                <i class="fas fa-home text-primary fa-4x"></i>
                            </div>
                            <a href="#" class="d-block fs-4 my-4">General Construction</a>
                            <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Mollitia, minima!</p>
                            <a class="btn btn-secondary py-2 px-4" href="#">Read More</a>
                        </div>
                        <div class="service-tytle">
                            <div class="d-flex align-items-center ps-4 w-100">
                                <h4>General Construction</h4>
                            </div>
                            <div class="btn-xl-square bg-secondary p-4" style="width: 80px; height: 80px;">
                                <i class="fas fa-home text-primary fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="{{ asset('frontend/img/service-2.jpg')}}" class="img-fluid w-100" alt="Image">
                        </div>
                        <div class="service-content text-center p-4">
                            <div class="bg-secondary btn-xl-square mx-auto" style="width: 120px; height: 120px;">
                                <i class="fas fa-users-cog text-primary fa-4x"></i>
                            </div>
                            <a href="#" class="d-block fs-4 my-4">Property Maintenance</a>
                            <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Mollitia, minima!</p>
                            <a class="btn btn-secondary py-2 px-4" href="#">Read More</a>
                        </div>
                        <div class="service-tytle">
                            <div class="d-flex align-items-center justify-content-start ps-4 w-100">
                                <h4>Property Maintenance</h4>
                            </div>
                            <div class="btn-xl-square bg-secondary p-4" style="width: 80px; height: 80px;">
                                <i class="fas fa-users-cog text-primary fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="{{ asset('frontend/img/service-3.jpg')}}" class="img-fluid w-100" alt="Image">
                        </div>
                        <div class="service-content text-center p-4">
                            <div class="bg-secondary btn-xl-square mx-auto" style="width: 120px; height: 120px;">
                                <i class="fas fa-hospital-user text-primary fa-4x"></i>
                            </div>
                            <a href="#" class="d-block fs-4 my-4">Project managment</a>
                            <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Mollitia, minima!</p>
                            <a class="btn btn-secondary py-2 px-4" href="#">Read More</a>
                        </div>
                        <div class="service-tytle">
                            <div class="d-flex align-items-center justify-content-start ps-4 w-100">
                                <h4>Project managment</h4>
                            </div>
                            <div class="btn-xl-square bg-secondary p-4" style="width: 80px; height: 80px;">
                                <i class="fas fa-hospital-user text-primary fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="{{ asset('frontend/img/service-4.jpg')}}" class="img-fluid w-100" alt="Image">
                        </div>
                        <div class="service-content text-center p-4">
                            <div class="bg-secondary btn-xl-square mx-auto" style="width: 100px; height: 100px;">
                                <i class="fas fa-file-invoice-dollar text-primary fa-4x"></i>
                            </div>
                            <a href="#" class="d-block fs-4 my-4">Virtual Design & Build</a>
                            <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Mollitia, minima!</p>
                            <a class="btn btn-secondary py-2 px-4" href="#">Read More</a>
                        </div>
                        <div class="service-tytle">
                            <div class="d-flex align-items-center justify-content-start ps-4 w-100">
                                <h4>Virtual Design & Build</h4>
                            </div>
                            <div class="btn-xl-square bg-secondary p-4" style="width: 80px; height: 80px;">
                                <i class="fas fa-file-invoice-dollar text-primary fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="{{ asset('frontend/img/service-5.jpg')}}" class="img-fluid w-100" alt="Image">
                        </div>
                        <div class="service-content text-center p-4">
                            <div class="bg-secondary btn-xl-square mx-auto" style="width: 100px; height: 100px;">
                                <i class="fas fa-cogs text-primary fa-4x"></i>
                            </div>
                            <a href="#" class="d-block fs-4 my-4">Preconstruction</a>
                            <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Mollitia, minima!</p>
                            <a class="btn btn-secondary py-2 px-4" href="#">Read More</a>
                        </div>
                        <div class="service-tytle">
                            <div class="d-flex align-items-center justify-content-start ps-4 w-100">
                                <h4>Preconstruction</h4>
                            </div>
                            <div class="btn-xl-square bg-secondary p-4" style="width: 80px; height: 80px;">
                                <i class="fas fa-cogs text-primary fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="{{ asset('frontend/img/service-6.jpg')}}" class="img-fluid w-100" alt="Image">
                        </div>
                        <div class="service-content text-center p-4">
                            <div class="bg-secondary btn-xl-square mx-auto" style="width: 100px; height: 100px;">
                                <i class="fas fa-sitemap text-primary fa-4x"></i>
                            </div>
                            <a href="#" class="d-block fs-4 my-4">Design Build</a>
                            <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Mollitia, minima!</p>
                            <a class="btn btn-secondary py-2 px-4" href="#">Read More</a>
                        </div>
                        <div class="service-tytle">
                            <div class="d-flex align-items-center justify-content-start ps-4 w-100">
                                <h4>Design Build</h4>
                            </div>
                            <div class="btn-xl-square bg-secondary p-4" style="width: 80px; height: 80px;">
                                <i class="fas fa-sitemap text-primary fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                    <a class="btn btn-secondary py-3 px-5 mt-4" href="#">More Services</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->

    <!-- Footer Start -->
    @include('frontend.partials.footer')
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    @include('frontend.partials.script')
</body>

</html>
