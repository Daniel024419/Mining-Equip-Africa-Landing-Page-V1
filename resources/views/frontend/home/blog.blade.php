<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.head')
    <title>Mining Equip Africa | Blog</title>
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
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Blog</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-secondary">Blog</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->
    <div class="container-fluid blog py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <p class="text-uppercase text-secondary fs-5 mb-0">News & Blog</p>
                <h2 class="display-4 text-capitalize mb-3">Our latest news posts and articles</h2>
            </div>
            <div class="row g-4">
                @foreach ($posts as $post)
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.{{ $loop->index + 2 }}s">
                        <div class="blog-item h-100">
                            <div class="blog-img">
                                <img src="{{ asset('frontend/img/' . $post->image) }}" class="img-fluid w-100"
                                    alt="{{ $post->title }}">
                            </div>
                            <div class="blog-content p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <p class="mb-0">
                                        <i class="fa fa-calendar-check text-secondary me-1"></i>
                                        {{ $post->published_at }}
                                    </p>
                                    <p class="mb-0">
                                        <i class="fa fa-user text-secondary me-1"></i>
                                        {{ $post->author->name }}
                                    </p>
                                </div>
                                <a href="{{ route('frontend.home.showPost', $post) }}"
                                    class="h4 d-block mb-4">{{ $post->title }}</a>
                                <a class="btn btn-secondary py-2 px-4" href="{{ route('frontend.home.showPost', $post) }}">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Footer Start -->
    @include('frontend.partials.footer')
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    @include('frontend.partials.script')    

</body>

</html>
