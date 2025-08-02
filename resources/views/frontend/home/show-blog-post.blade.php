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
    <div class="container-fluid py-5">
        <div class="container py-5">
            <!-- Back Button -->
            <div class="mb-4">
                <a href="{{ route('frontend.home.blog') }}" class="btn btn-secondary py-2 px-4">
                    <i class="fas fa-arrow-left me-2"></i> Back to Blog
                </a>

                <!-- Share Button -->
                <button class="btn btn-primary py-2 px-4" onclick="openShareActions('{{ json_encode($post->id) }}')"
                    >
                    <i class="fas fa-share-alt" id="shareIcon"></i> Share Post
                </button>
            </div>

            <!-- Main Content -->
            <div class="row">
                <!-- Article -->
                <div class="col-lg-8">
                    <div class="blog-item">
                        <!-- Featured Image -->
                        <div class="blog-img mb-4">
                            <img src="{{ asset('frontend/img/' . $post->image) }}" class="img-fluid w-100 rounded"
                                alt="{{ $post->title }}">
                        </div>

                        <!-- Meta Info -->
                        <div class="d-flex justify-content-between mb-4">
                            <p class="mb-0 text-muted">
                                <i class="fa fa-calendar-check text-secondary me-1"></i>
                                {{ $post->published_at }}
                            </p>
                            <p class="mb-0 text-muted">
                                <i class="fa fa-user text-secondary me-1"></i>
                                By {{ $post->author->name }}
                            </p>
                        </div>

                        <!-- Title -->
                        <h1 class="display-5 mb-4">{{ $post->title }}</h1>

                        <!-- Content -->
                        <div class="blog-content">
                            {!! $post->content !!}
                        </div>

                        <!-- Tags/Categories (Optional) -->
                        <div class="mt-5 pt-4 border-top">
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge bg-secondary">Mining</span>
                                <span class="badge bg-secondary">Equipment</span>
                                <span class="badge bg-secondary">Technology</span>
                            </div>
                        </div>
                    </div>

                    @include('frontend.home.blog-comment-partial')
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="bg-light p-4 rounded mb-4">
                        <h4 class="mb-4">Latest Posts</h4>
                        @foreach ($recentPosts as $recent)
                            <div class="d-flex mb-3">
                                <img src="{{ asset('files/' . $recent->image) }}" class="img-fluid rounded"
                                    style="width: 80px; height: 80px; object-fit: cover;" alt="{{ $recent->title }}">
                                <div class="ms-3">
                                    <h6 class="mb-1">
                                        <a
                                            href="{{ route('frontend.home.showPost', $recent) }}">{{ Str::limit($recent->title, 40) }}</a>
                                    </h6>
                                    <small class="text-muted">
                                        {{ $recent->published_at }}
                                    </small>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Categories Widget (Optional) -->
                    <div class="bg-light p-4 rounded">
                        <h4 class="mb-4">Categories</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="#" class="text-dark">Mining Equipment <span
                                        class="float-end">(5)</span></a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-dark">Drilling Technology <span
                                        class="float-end">(3)</span></a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-dark">Safety Standards <span
                                        class="float-end">(2)</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Start -->
    @include('frontend.partials.footer')
    <!-- Footer End -->
    @include('frontend.home.partials.share-and-copy-post-to-clipboard')
    <!-- JavaScript Libraries -->
    @include('frontend.partials.script')
</body>

</html>
