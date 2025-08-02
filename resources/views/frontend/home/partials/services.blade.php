<div class="container-fluid service py-5" style="background: #000;">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <p class="text-uppercase text-warning fs-5 mb-0 fw-bold">OUR EXPERTISE</p>
            <h2 class="display-4 text-capitalize mb-3 text-white">Mining Solutions That Deliver Results</h2>
            <p class="text-light fs-5">Comprehensive services for Africa's mining operations, from equipment to drilling
                and training</p>
        </div>
        <div class="row g-4">
            @foreach ($services as $service)
                <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay="{{ 0.2 + $loop->index * 0.1 }}s"
                    data-category="{{ $service->category }}">
                    <div
                        class="service-card h-100 bg-white rounded-4 overflow-hidden shadow-sm transition-all hover-shadow-lg">
                        <div class="service-img position-relative overflow-hidden">
                            <img src="{{ asset('files/' . $service->image) }}"
                                class="img-fluid w-100 transition-transform hover-scale" alt="{{ $service->title }}"
                                style="height: 220px; object-fit: cover;">
                            <div
                                class="service-badge position-absolute top-3 end-3 bg-primary text-white px-3 py-1 rounded-pill small">
                                {{ ucfirst($service->category) }}
                            </div>
                            <div class="service-overlay position-absolute w-100 h-100 top-0 start-0 bg-dark opacity-10">
                            </div>
                        </div>
                        <div class="service-content p-4 pb-5 position-relative">
                            <div class="service-icon position-absolute top-0 start-50 translate-middle">
                                <div class="bg-primary btn-xl-square mx-auto d-flex align-items-center justify-content-center shadow-sm"
                                    style="width: 70px; height: 70px; margin-top: -35px; border: 4px solid white;">
                                    <i class="{{ $service->icon }} text-white fa-2x"></i>
                                </div>
                            </div>
                            <div class="pt-4 text-center">
                                <h4 class="mb-3 fw-bold">{{ Str::ucfirst($service->title) }}</h4>
                                <p class="mb-4 text-muted">{{ Str::limit($service->description, 120) }}</p>
                                <a href="{{ route('frontend.home.showService', $service->id) }}"
                                    class="btn btn-primary rounded-pill px-4 py-2 d-inline-flex align-items-center">
                                    Learn More <i class="fas fa-arrow-right ms-2 small"></i>
                                </a>

                                <!-- Share Button -->
                                <button class="btn btn-warning rounded-pill px-4 py-2 d-inline-flex align-items-center"
                                    onclick="openShareActions('{{ json_encode($service->id) }}')">
                                    <i class="fas fa-share-alt me-2" id="shareIcon"></i> Share
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
            <!-- CTA Button -->
            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                <a class="btn btn-outline-warning py-3 px-5 mt-4 fw-bold" href="{{ route('frontend.home.services') }}">
                    <i class="fas fa-hard-hat me-2"></i> View All Services
                </a>
            </div>
        </div>
    </div>
</div>
