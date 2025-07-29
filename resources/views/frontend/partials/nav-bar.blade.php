<div class="container-fluid sticky-top px-0 shadow-sm" style="background: #000;">
    <nav class="navbar navbar-expand-lg navbar-dark py-3 px-4">
        <div class="container">
            <!-- Logo with Mining Branding -->
            <a href="{{ route('frontend.home.index') }}" class="navbar-brand d-flex align-items-center gap-2 p-0">
                <img src="{{ asset('logo.png') }}" alt="Mining Equip Africa Logo" style="height: 45px; width: auto;">
                <h1 class="text-warning mb-0" style="font-size: 1.8rem; font-weight: 700;">
                    <span class="text-white"><span class="text-warning">AFRICA</span>
                </h1>
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler border-warning" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-warning"></span>
            </button>

            <!-- Main Navigation -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto pt-2 pt-lg-0">
                    <a href="{{ route('frontend.home.index') }}" class="nav-item nav-link px-3 text-white">Home</a>
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle px-3 text-white" data-bs-toggle="dropdown">Equipment</a>
                        <div class="dropdown-menu m-0 border-0 shadow-sm" style="background: #111;">
                            <a href="{{ route('frontend.home.equipments','all') }}" class="dropdown-item text-white">All Machinery</a>
                            <a href="{{ route('frontend.home.equipments','new') }}" class="dropdown-item text-white">New Machinery</a>
                            <a href="{{ route('frontend.home.equipments','used') }}" class="dropdown-item text-white">Used Equipment</a>
                            <a href="{{ route('frontend.home.equipments','rental') }}" class="dropdown-item text-white">Rental Fleet</a>
                            <div class="dropdown-divider border-warning"></div>
                        </div>
                    </div>
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle px-3 text-white" data-bs-toggle="dropdown">Services</a>
                        <div class="dropdown-menu m-0 border-0 shadow-sm" style="background: #111;">
                            <a href="{{ route('frontend.home.services') }}" class="dropdown-item text-white">Drilling Services</a>
                            <a href="{{ route('frontend.home.services') }}" class="dropdown-item text-white">Equipment Maintenance</a>
                            <a href="{{ route('frontend.home.services') }}" class="dropdown-item text-white">Operator Training</a>
                        </div>
                    </div>
                    
                    <a href="{{ route('frontend.home.projects') }}" class="nav-item nav-link px-3 text-white">Case Studies</a>
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle px-3 text-white" data-bs-toggle="dropdown">Company</a>
                        <div class="dropdown-menu m-0 border-0 shadow-sm" style="background: #111;">
                            <a href="{{ route('frontend.home.about') }}" class="dropdown-item text-white">About Us</a>
                            <a href="{{ route('frontend.home.teams') }}" class="dropdown-item text-white">Our Team</a>
                            <a href="{{ route('frontend.home.testimonial') }}" class="dropdown-item text-white">Client Testimonials</a>
                            <a href="{{ route('frontend.home.blog') }}" class="dropdown-item text-white">Our Blog</a>
                            <a href="{{ route('frontend.home.gallery') }}" class="dropdown-item text-white">Our Gallery</a>
                            <a href="{{ route('frontend.home.features') }}" class="dropdown-item text-white">Our Features</a>
                            <a href="{{ route('frontend.home.projects') }}" class="dropdown-item text-white">Our Projects</a>
                        </div>
                    </div>
                    
                    <a href="{{ route('frontend.home.contacts') }}" class="nav-item nav-link px-3 text-white">Contact</a>
                </div>

                <!-- Call-to-Action Buttons -->
                <div class="d-flex align-items-center flex-nowrap pt-3 pt-lg-0 ms-lg-3">
                    <button class="btn btn-outline-warning py-2 px-3" data-bs-toggle="modal" data-bs-target="#searchModal">
                        <i class="fas fa-search"></i>
                    </button>
                    <a href="tel:0244428332" class="btn btn-warning py-2 px-4 ms-3 fw-bold text-dark">
                        <i class="fas fa-phone-alt me-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>

<!-- Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark border-warning">
            <div class="modal-header border-warning">
                <h5 class="modal-title text-warning">Search Mining Equipment</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="d-flex">
                    <input type="search" class="form-control bg-transparent text-white border-warning" placeholder="Search equipment or services...">
                    <button type="submit" class="btn btn-warning ms-2">
                        <i class="fas fa-search text-dark"></i>
                    </button>
                </form>
                <div class="mt-3">
                    <p class="text-warning mb-1">Popular Searches:</p>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="#" class="badge bg-warning text-dark">RC Drills</a>
                        <a href="#" class="badge bg-warning text-dark">Excavators</a>
                        <a href="#" class="badge bg-warning text-dark">Diamond Core</a>
                        <a href="#" class="badge bg-warning text-dark">Training</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>