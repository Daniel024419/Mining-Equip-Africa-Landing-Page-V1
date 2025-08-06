<!-- Hero Carousel - Responsive -->
<div class="container-fluid overflow-hidden px-0">
    <div id="miningCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <!-- Carousel Indicators -->
        <ol class="carousel-indicators">
            <li data-bs-target="#miningCarousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#miningCarousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#miningCarousel" data-bs-slide-to="2"></li>
        </ol>

        <!-- Carousel Slides -->
        <div class="carousel-inner">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="{{ asset('frontend/img/carousel-1.jpg') }}" class="img-fluid w-100"
                    alt="Mining Equipment Solutions" />
                <div class="carousel-caption text-start text-sm-start">
                    <p class="text-uppercase text-warning fs-5 fw-bold">HEAVY EQUIPMENT SPECIALISTS</p>
                    <h1 class="display-3 text-white fw-bold mb-3">Premium Mining Machinery</h1>
                    <p class="lead text-light mb-4">New, used and leased equipment with full-service support across
                        Africa</p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('frontend.home.services') }}" class="btn btn-warning px-4 py-3 fw-bold">
                            <i class="fas fa-truck-monster me-2"></i> Browse Inventory
                        </a>
                        <a href="{{ route('frontend.home.about') }}" class="btn btn-outline-light px-4 py-3">
                            <i class="fas fa-phone-alt me-2"></i> Contact Experts
                        </a>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="{{ asset('frontend/img/carousel-2.jpg') }}" class="img-fluid w-100" alt="Drilling Services" />
                <div class="carousel-caption text-center">
                    <p class="text-uppercase text-warning fs-5 fw-bold">PRECISION DRILLING</p>
                    <h1 class="display-3 text-white fw-bold mb-3">Advanced Exploration Technology</h1>
                    <p class="lead text-light mb-4">RC, Diamond & Blast drilling services with Africa's most reliable
                        rigs</p>
                    <div class="d-flex flex-wrap gap-3 justify-content-center">
                        <a href="{{ route('frontend.home.services') }}" class="btn btn-warning px-4 py-3 fw-bold">
                            <i class="fas fa-hammer me-2"></i> View Services
                        </a>
                        <a href="#" class="btn btn-outline-light px-4 py-3">
                            <i class="fas fa-file-alt me-2"></i> Get Quote
                        </a>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="{{ asset('frontend/img/carousel-3.jpg') }}" class="img-fluid w-100" alt="Operator Training" />
                <div class="carousel-caption text-end text-sm-end">
                    <p class="text-uppercase text-warning fs-5 fw-bold">CERTIFIED TRAINING</p>
                    <h1 class="display-3 text-white fw-bold mb-3">World-Class Operator Programs</h1>
                    <p class="lead text-light mb-4">Reduce downtime and accidents with our certified equipment training
                    </p>
                    <div class="d-flex flex-wrap gap-3 justify-content-end">
                        <a href="#" class="btn btn-outline-light px-4 py-3">
                            <i class="fas fa-calendar-alt me-2"></i> Schedule
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carousel Controls (Font Awesome Icons, bg-dark, text-white) -->
        <button class="carousel-control-prev" type="button" data-bs-target="#miningCarousel" data-bs-slide="prev">
            <span class="bg-dark bg-opacity-75 p-3 rounded-circle">
                <i class="fas fa-chevron-left fa-2x text-white"></i>
            </span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#miningCarousel" data-bs-slide="next">
            <span class="bg-dark bg-opacity-75 p-3 rounded-circle">
                <i class="fas fa-chevron-right fa-2x text-white"></i>
            </span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>
</div>
