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
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Our Services</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}">Home</a></li>
                <li class="breadcrumb-item active text-secondary">Services</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Services Start -->
    <div class="container-fluid service bg-light py-5">
        <div class="container py-5 bg-black ">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <p class="text-uppercase text-primary fs-5 mb-0">Mining Solutions</p>
                <h2 class="display-4 text-capitalize mb-3">Specialized Mining Services</h2>
                <p class="lead">Comprehensive solutions for Africa's mining industry</p>
            </div>

            <!-- Service Filter -->
            <div class="row mb-5 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12 text-center">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-primary active" data-filter="all">All
                            Services</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="equipment">Equipment
                            Services</button>
                        <button type="button" class="btn btn-outline-primary"
                            data-filter="consulting">Consulting</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="support">Support</button>
                    </div>
                </div>
            </div>

            <!-- Services Grid -->
            <!-- Services Grid -->
            <div class="row g-4">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay="{{ 0.2 + $loop->index * 0.1 }}s"
                        data-category="{{ $service->category }}">
                        <div
                            class="service-card h-100 bg-white rounded-4 overflow-hidden shadow-sm transition-all hover-shadow-lg">
                            <div class="service-img position-relative overflow-hidden" style="min-height: 220px;">
                                <img src="{{ asset('files/' . ($service->image ?? 'default.png')) }}"
                                    class="img-fluid w-100 transition-transform hover-scale" alt="{{ $service->title }}"
                                    style="height: 220px; object-fit: cover;"
                                    onerror="this.onerror=null; this.src='{{ asset('files/default.png') }}'">

                                <div
                                    class="service-badge position-absolute top-3 end-3 bg-primary text-white px-3 py-1 rounded-pill small">
                                    {{ ucfirst($service->category) }}
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
                                    <button
                                        class="btn btn-warning rounded-pill px-4 py-2 d-inline-flex align-items-center"
                                        onclick="openShareActions('{{ json_encode($service->id) }}')">
                                        <i class="fas fa-share-alt me-2" id="shareIcon"></i> Share
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="row mt-5 wow fadeInUp mt-3 justify-content-center" data-wow-delay="0.3s">
                {{ $services->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
    <!-- Services End -->

    <!-- Footer Start -->
    @include('frontend.partials.footer')
    <!-- Footer End -->
    @include('frontend.home.partials.share-and-copy-service-to-clipboard')
    <!-- JavaScript Libraries -->
    @include('frontend.partials.script')

    <!-- Service Filter Script -->
    <script>
        $(document).ready(function() {
            $('[data-filter]').click(function() {
                const filter = $(this).data('filter');
                $('[data-filter]').removeClass('active');
                $(this).addClass('active');

                if (filter === 'all') {
                    $('[data-category]').fadeIn();
                } else {
                    $('[data-category]').each(function() {
                        $(this).toggle($(this).data('category') === filter);
                    });
                }
            });
        });
    </script>
</body>

</html>
