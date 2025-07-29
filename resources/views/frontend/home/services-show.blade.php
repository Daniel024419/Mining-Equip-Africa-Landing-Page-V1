<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.head')
    <title>Mining Equip Africa | {{ $service->title }}</title>
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
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ $service->title }}</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('frontend.home.services') }}">Services</a></li>
                <li class="breadcrumb-item active text-secondary">{{ $service->title }}</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Service Detail Start -->
    <div class="container-fluid service-detail py-5">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Main Content -->
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-detail-content bg-white rounded shadow-sm p-4 mb-5">
                        <div class="service-main-img mb-4">
                            <img src="{{ $service->image_url }}" class="img-fluid w-100 rounded" alt="{{ $service->title }}">
                            <div class="service-badge bg-primary text-white p-2 px-3 rounded-pill d-inline-block mt-3">
                                {{ ucfirst($service->category) }} Service
                            </div>
                        </div>
                        <h2 class="mb-4">{{ $service->title }}</h2>
                        <div class="service-description mb-5">
                            {!! nl2br(e($service->description)) !!}
                        </div>

                        <!-- Features (if available) -->
                        @if($service->features)
                        <div class="service-features mb-5">
                            <h4 class="mb-4">Key Features</h4>
                            <ul class="list-unstyled">
                                @foreach(explode("\n", $service->features) as $feature)
                                    @if(trim($feature))
                                        <li class="mb-2">
                                            <i class="fas fa-check-circle text-primary me-2"></i>
                                            {{ trim($feature) }}
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                    <!-- Service Categories -->
                    <div class="service-categories bg-white rounded shadow-sm p-4 mb-4">
                        <h4 class="mb-4">Our Service Categories</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="{{ route('frontend.home.services') }}?category=equipment" class="d-flex justify-content-between align-items-center py-2 px-3 rounded {{ $service->category == 'equipment' ? 'bg-light' : '' }}">
                                    <span><i class="fas fa-truck-pickup text-primary me-2"></i> Equipment Services</span>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ route('frontend.home.services') }}?category=consulting" class="d-flex justify-content-between align-items-center py-2 px-3 rounded {{ $service->category == 'consulting' ? 'bg-light' : '' }}">
                                    <span><i class="fas fa-clipboard-check text-primary me-2"></i> Consulting</span>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('frontend.home.services') }}?category=support" class="d-flex justify-content-between align-items-center py-2 px-3 rounded {{ $service->category == 'support' ? 'bg-light' : '' }}">
                                    <span><i class="fas fa-tools text-primary me-2"></i> Support</span>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Contact CTA -->
                    <div class="contact-cta bg-primary rounded shadow-sm p-4 text-white">
                        <h4 class="mb-4">Need This Service?</h4>
                        <p class="mb-4">Contact us today to discuss how we can support your mining operations.</p>
                        <a href="{{ route('frontend.home.contacts') }}" class="btn btn-light py-2 px-4">Contact Us</a>
                    </div>
                </div>
            </div>

            <!-- Related Services -->
            <div class="row mt-5 wow fadeInUp" data-wow-delay="0.2s">
                <div class="col-12">
                    <h3 class="mb-5">Related Services</h3>
                </div>
                @foreach($relatedServices as $related)
                <div class="col-lg-4 mb-4">
                    <div class="related-service bg-white rounded shadow-sm overflow-hidden h-100">
                        <div class="related-img">
                            <img src="{{ $related->image_url }}" class="img-fluid w-100" alt="{{ $related->title }}">
                        </div>
                        <div class="related-content p-4">
                            <h5 class="mb-3">{{ $related->title }}</h5>
                            <p class="mb-3">{{ Str::limit($related->description, 100) }}</p>
                            <a href="{{ route('frontend.home.showService', $related->id) }}" class="btn btn-primary py-2 px-4">View Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service Detail End -->

    <!-- Footer Start -->
    @include('frontend.partials.footer')
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    @include('frontend.partials.script')
</body>
</html>