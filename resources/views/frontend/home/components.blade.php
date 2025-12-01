<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.head')
    <title>Mining Equip Africa | Components</title>
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
    <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('{{ asset('frontend/img/mining-equipment-banner.jpg') }}') center/cover no-repeat;">
        <div class="container py-5 text-center" style="max-width: 900px;">
            <h1 class="mb-4 text-white display-4 wow fadeInDown" data-wow-delay="0.1s">Mining Equipment Components</h1>
            <ol class="mb-0 breadcrumb d-flex justify-content-center wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}" class="text-light">Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-light">Products</a></li>
                <li class="breadcrumb-item active text-warning">Components</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Components Start -->
    <div class="py-5 container-fluid bg-dark">
        <div class="container py-5">
            <div class="pb-5 mx-auto text-center wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <p class="mb-0 text-uppercase text-warning fs-5 fw-bold">QUALITY COMPONENTS</p>
                <h2 class="mb-3 text-white display-4 text-capitalize">Mining Equipment Components & Parts</h2>
                <p class="text-light">Quality replacement parts and components for your mining equipment</p>
            </div>

            <div class="row g-4">
                @forelse ($components as $component)
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="{{ 0.2 + ($loop->index % 3) * 0.2 }}s">
                        <div class="overflow-hidden border component-item border-warning rounded-4 bg-dark h-100">
                            <div class="component-img position-relative">
                                @if ($component->images->isNotEmpty())
                                    <img src="{{ asset('files/' . ($component->images->first()->path ?? 'default.png')) }}"
                                        class="transition-transform img-fluid w-100 hover-scale"
                                        alt="{{ $component->name }}" style="height: 220px; object-fit: cover;"
                                        onerror="this.onerror=null; this.src='{{ asset('files/default.png') }}'">
                                @else
                                    <img src="{{ asset('files/default.png') }}"
                                        class="transition-transform img-fluid w-100 hover-scale"
                                        alt="{{ $component->name }}" style="height: 220px; object-fit: cover;">
                                @endif

                                <div
                                    class="top-0 px-3 py-1 m-3 component-badge bg-warning text-dark position-absolute end-0 rounded-pill fw-bold text-uppercase">
                                    {{ strtoupper($component->condition) }}
                                </div>
                            </div>
                            <div class="p-4 component-content">
                                <div class="mb-3 justify-content-between align-items-center">
                                    <h3 class="mb-0 text-warning">{{ Str::ucfirst($component->name) }}</h3>
                                    <br>
                                    <div class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <ul class="mb-4 text-light">
                                    <li>Category: {{ $component->category }}</li>
                                    <li>Equipment: {{ $component->equipment_type }}</li>
                                    <li>{{ Str::limit($component->description, 60) }}</li>
                                </ul>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="gap-2 d-flex align-items-center">
                                        <a href="{{ route('frontend.home.showComponent', $component->id) }}"
                                            class="px-4 py-2 btn btn-outline-warning">Details</a>

                                        <!-- Share Button -->
                                        <button class="px-4 py-2 btn btn-outline-warning"
                                            onclick="openShareActions('{{ json_encode($component->id) }}')">
                                            <i class="fas fa-share-alt" id="shareIcon"></i> Share
                                        </button>
                                    </div>

                                   
                                </div> <br>
                                 <span class="text-warning fw-bold">
                                        GHS
                                        {{ is_numeric($component->price) ? number_format($component->price, 2) : $component->price }}
                                    </span>
                                    
                                    <span class="text-warning fw-bold ms-3">
                                        USD
                                        {{ number_format(CurrencyConverter::convert($component->price)->from('GHS')->to('USD')->get(), 2) }}
                                    </span>
                                    <span class="text-warning fw-bold ms-3">
                                        CFA
                                        {{ number_format(CurrencyConverter::convert($component->price)->from('GHS')->to('XOF')->get(), 2) }}
                                    </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <h2 class="text-white">No {{ request('condition') }} components matching the condition is found
                    </h2>
                @endforelse

                <!-- Pagination -->
                <div class="mt-3 mt-5 row wow fadeInUp justify-content-center" data-wow-delay="0.3s">
                    {{ $components->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    <!-- Components End -->

    <!-- Component Categories Start -->
    <div class="py-5 bg-black container-fluid">
        <div class="container py-5">
            <div class="pb-5 mx-auto text-center wow fadeInUp" data-wow-delay="0.2s">
                <h2 class="mb-3 text-white display-4 text-capitalize">Component Categories</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="p-4 text-center border category-card bg-dark border-warning rounded-4 h-100">
                        <div class="mb-4 bg-warning rounded-circle d-inline-flex align-items-center justify-content-center"
                            style="width: 80px; height: 80px;">
                            <i class="fas fa-cog text-dark fa-3x"></i>
                        </div>
                        <h4 class="mb-3 text-warning">Engine Components</h4>
                        <ul class="text-light text-start">
                            <li>Pistons & Rings</li>
                            <li>Crankshafts</li>
                            <li>Engine Blocks</li>
                            <li>Cylinder Heads</li>
                        </ul>
                        <a href="#" class="mt-2 btn btn-outline-warning">Explore</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="p-4 text-center border category-card bg-dark border-warning rounded-4 h-100">
                        <div class="mb-4 bg-warning rounded-circle d-inline-flex align-items-center justify-content-center"
                            style="width: 80px; height: 80px;">
                            <i class="fas fa-tools text-dark fa-3x"></i>
                        </div>
                        <h4 class="mb-3 text-warning">Hydraulic Parts</h4>
                        <ul class="text-light text-start">
                            <li>Pumps & Motors</li>
                            <li>Cylinders</li>
                            <li>Valves</li>
                            <li>Hoses & Fittings</li>
                        </ul>
                        <a href="#" class="mt-2 btn btn-outline-warning">Explore</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="p-4 text-center border category-card bg-dark border-warning rounded-4 h-100">
                        <div class="mb-4 bg-warning rounded-circle d-inline-flex align-items-center justify-content-center"
                            style="width: 80px; height: 80px;">
                            <i class="fas fa-bolt text-dark fa-3x"></i>
                        </div>
                        <h4 class="mb-3 text-warning">Electrical Parts</h4>
                        <ul class="text-light text-start">
                            <li>Alternators</li>
                            <li>Starters</li>
                            <li>Sensors</li>
                            <li>Control Modules</li>
                        </ul>
                        <a href="#" class="mt-2 btn btn-outline-warning">Explore</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="p-4 text-center border category-card bg-dark border-warning rounded-4 h-100">
                        <div class="mb-4 bg-warning rounded-circle d-inline-flex align-items-center justify-content-center"
                            style="width: 80px; height: 80px;">
                            <i class="fas fa-wrench text-dark fa-3x"></i>
                        </div>
                        <h4 class="mb-3 text-warning">Mechanical Parts</h4>
                        <ul class="text-light text-start">
                            <li>Gears & Shafts</li>
                            <li>Bearings</li>
                            <li>Bushings</li>
                            <li>Couplings</li>
                        </ul>
                        <a href="#" class="mt-2 btn btn-outline-warning">Explore</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Component Categories End -->

    <!-- Footer Start -->
    @include('frontend.partials.footer')
    <!-- Footer End -->
    @include('frontend.home.partials.share-and-copy-components-to-clipboard')
    <!-- JavaScript Libraries -->
    @include('frontend.partials.script')
</body>

</html>
