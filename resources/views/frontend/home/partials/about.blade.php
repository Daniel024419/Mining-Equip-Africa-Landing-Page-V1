<div class="container-fluid about py-5" style="background: #000;">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <!-- Image Gallery (Left Column) -->
            <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.1s">
                <div class="d-flex position-relative">
                    <!-- Main Equipment Image (Responsive) -->
                    <img src="{{ asset('logo.png') }}" alt="Mining Drill Rig" class="img-fluid w-100">

                    <!-- Overlay Badge (Gold Accent) -->
                    <div class="position-absolute top-0 start-0 translate-middle bg-warning p-3 rounded-circle shadow"
                        style="width: 120px; height: 120px;">
                        <div class="d-flex flex-column h-100 justify-content-center align-items-center">
                            <span class="fs-1 fw-bold text-dark">8+</span>
                            <small class="text-dark text-center">Years Experience</small>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Content (Right Column) -->
            <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.1s">
                <div class="about-item-content text-white">
                    <p class="text-uppercase text-warning fs-5 mb-0 fw-bold">AFRICA'S MINING EQUIPMENT SPECIALISTS</p>
                    <h2 class="display-4 text-capitalize mb-3" style="color: #FFD700;">Powering Africa's Mining Industry
                    </h2>
                    <p class="mb-4 fs-5">
                        Mining Equip Africa LTD is a market-focused mining services company providing comprehensive
                        equipment solutions for both underground and surface operations. Established in 2017, we meet
                        the growing demand for heavy-duty equipment in Africa's capital-intensive mining sector.
                    </p>

                    <!-- Key Services -->
                    <div class="pb-4 mb-4 border-botom border-warning">
                        <div class="row g-4">
                            <div class="col-lg-4">
                                <img src="{{ asset('files/mining equip.png') }}" class="img-fluid rounded-3 h-100"
                                    alt="Drill Rig in Action" style="object-fit: cover;">
                            </div>
                            <div class="col-lg-8">
                                <div class="d-flex mb-4 align-items-center">
                                    <div class="text-warning me-3">
                                        <i class="fas fa-tags fa-3x"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-warning mb-1">Equipment Sales & Leasing</h4>
                                        <p class="mb-0">New and refurbished mining machinery with flexible
                                            purchase/lease options</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="text-warning me-3">
                                        <i class="fas fa-shopping-cart fa-3x"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-warning mb-1">Equipment Purchasing</h4>
                                        <p class="mb-0">We buy used mining equipment in any condition across Africa
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Company Details -->
                    <div class="mb-4">
                        <h4 class="text-warning mb-3">Our Mission</h4>
                        <p class="text-light">
                            To establish first-class integrated mining services across Africa, delivering exceptional
                            value through efficient equipment solutions and maintaining the highest industry standards.
                        </p>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="d-flex mb-3">
                                    <i class="fas fa-phone-alt text-warning me-3 mt-1"></i>
                                    <div>
                                        <h5 class="text-warning mb-1">Contact</h5>
                                        <p class="text-light mb-0">+233 24 442 8332</p>
                                        <p class="text-light mb-0">+233 20 067 2219</p>
                                        <p class="text-light mb-0">+233 55 324 7728</p>
                                        <p class="text-light mb-0">Office: 031 229 1486</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex mb-3">
                                    <i class="fas fa-map-marker-alt text-warning me-3 mt-1"></i>
                                    <div>
                                        <h5 class="text-warning mb-1">Location</h5>
                                        <p class="text-light mb-0">P.O. Box TD 483, Takoradi Airport Ridge, Ghana</p>
                                        <p class="text-light mb-0"> Bibiani, Ghana </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#" class="btn btn-warning py-3 px-4 fw-bold text-dark">
                            <i class="fas fa-truck me-2"></i> View Inventory
                        </a>
                        <a href="{{ route('frontend.home.about') }}" class="btn btn-outline-warning py-3 px-4 fw-bold">
                            <i class="fas fa-file-alt me-2"></i> Company Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
