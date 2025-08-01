<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.head')
    <title>Mining Equip Africa | Equipment Gallery</title>
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

    <!-- Gallery Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Equipment Gallery</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}">Home</a></li>
                <li class="breadcrumb-item active text-secondary">Equipment Gallery</li>
            </ol>
        </div>
    </div>
    <!-- Gallery Header End -->

    <!-- Gallery Start -->
    <div class="container-fluid gallery bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <p class="text-uppercase text-primary fs-5 mb-0">Our Inventory</p>
                <h2 class="display-4 text-capitalize mb-3">Featured Mining Equipment</h2>
                <p class="lead">Browse our catalog of surface and underground mining machinery</p>
            </div>
            
            <!-- Equipment Filter -->
            <div class="row mb-5 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12 text-center">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-primary active" data-filter="all">All Equipment</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="surface">Surface Mining</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="underground">Underground</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="refurbished">Refurbished</button>
                    </div>
                </div>
            </div>

            <!-- Gallery Grid -->
            <div class="row g-4">
                @forelse($equipment as $item)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s" data-category="{{ $item->category }}">
                    <div class="gallery-item bg-white rounded shadow-sm overflow-hidden h-100">
                        <div class="gallery-img position-relative">
                            <img src="{{ asset('files/'.$item->image) }}" class="img-fluid w-100" alt="{{ $item->name }}">
                            <div class="category-badge position-absolute top-0 end-0 bg-primary text-white p-2">
                                {{ ucfirst($item->category) }}
                            </div>
                        </div>
                        <div class="gallery-content p-4">
                            <h4 class="mb-3">{{ $item->name }}</h4>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted"><i class="fa fa-calendar-check text-primary me-1"></i> {{ $item->year }}</span>
                                <span class="text-muted"><i class="fa fa-cog text-primary me-1"></i> {{ $item->condition }}</span>
                            </div>
                            <p class="mb-4">{{ Str::limit($item->description, 100) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="text-primary mb-0">GHS {{ number_format($item->price) }}</h5>
                                <a href="{{ route('frontend.home.showEquiment', $item->id) }}" class="btn btn-primary py-2 px-4">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <h2>No equipment yet</h2>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="row mt-5 wow fadeInUp mt-3 justify-content-center" data-wow-delay="0.3s">
                {{ $equipment->links('pagination::bootstrap-4') }}
            </div>
             
        </div>
    </div>
    <!-- Gallery End -->

    <!-- Footer Start -->
    @include('frontend.partials.footer')
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    @include('frontend.partials.script')

    <!-- Gallery Filter Script -->
    <script>
        $(document).ready(function(){
            $('[data-filter]').click(function(){
                const filter = $(this).data('filter');
                $('[data-filter]').removeClass('active');
                $(this).addClass('active');
                
                if(filter === 'all') {
                    $('[data-category]').fadeIn();
                } else {
                    $('[data-category]').each(function(){
                        $(this).toggle($(this).data('category') === filter);
                    });
                }
            });
        });
    </script>
</body>

</html>