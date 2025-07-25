<div class="container-fluid about py-5" style="background: #000;">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <!-- Image Gallery (Left Column) -->
            <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.1s">
                <div class="about-item-image d-flex position-relative">
                    <!-- Main Equipment Image -->
                    <img src="{{ asset('frontend/img/mining-equipment-1.jpg') }}" class="img-fluid rounded-4 w-50" alt="Mining Drill Rig">
                    <!-- Secondary Image -->
                    <img src="{{ asset('frontend/img/mining-team.jpg') }}" class="img-fluid rounded-4 w-50 ms-3" alt="Mining Team">
                    <!-- Overlay Badge (Gold Accent) -->
                    <div class="position-absolute top-0 start-0 translate-middle bg-warning p-3 rounded-circle shadow" style="width: 120px; height: 120px;">
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
                    <h2 class="display-4 text-capitalize mb-3" style="color: #FFD700;">Powering Africa's Mining Industry</h2>
                    <p class="mb-4 fs-5">
                        Since 2017, Mining Equip Africa has delivered reliable equipment solutions and drilling services to mining operations across the continent. We combine industry expertise with cutting-edge technology to maximize your productivity.
                    </p>

                    <!-- Key Services -->
                    <div class="pb-4 mb-4 border-bottom border-warning">
                        <div class="row g-4">
                            <div class="col-lg-4">
                                <img src="{{ asset('frontend/img/drill-rig-action.jpg') }}" class="img-fluid rounded-3 h-100" alt="Drill Rig in Action" style="object-fit: cover;">
                            </div>
                            <div class="col-lg-8">
                                <div class="d-flex mb-4 align-items-center">
                                    <div class="text-warning me-3">
                                        <i class="fas fa-hard-hat fa-3x"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-warning mb-1">Full-Service Solutions</h4>
                                        <p class="mb-0">Equipment sales, leasing, and refurbishment</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="text-warning me-3">
                                        <i class="fas fa-tools fa-3x"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-warning mb-1">Certified Technicians</h4>
                                        <p class="mb-0">Factory-trained equipment maintenance teams</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Key Features Grid -->
                    <div class="row gy-3 gx-4 pb-4">
                        <div class="col-lg-6">
                            <p class="text-white"><i class="fas fa-check-circle text-warning me-2"></i> <strong>RC & Diamond Drilling</strong></p>
                            <p class="text-white"><i class="fas fa-check-circle text-warning me-2"></i> <strong>24/7 Technical Support</strong></p>
                        </div>
                        <div class="col-lg-6">
                            <p class="text-white"><i class="fas fa-check-circle text-warning me-2"></i> <strong>Operator Training Programs</strong></p>
                            <p class="text-white"><i class="fas fa-check-circle text-warning me-2"></i> <strong>Africa-Wide Logistics</strong></p>
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#" class="btn btn-warning py-3 px-4 fw-bold text-dark">
                            <i class="fas fa-hard-hat me-2"></i> View Equipment
                        </a>
                        <a href="#" class="btn btn-outline-warning py-3 px-4 fw-bold">
                            <i class="fas fa-phone-alt me-2"></i> Contact Experts
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>