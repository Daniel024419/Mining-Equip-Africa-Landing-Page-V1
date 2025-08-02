<div class="container-fluid blog pb-5 bg-light">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <p class="text-uppercase text-primary fs-5 mb-0">Industry Insights</p>
            <h2 class="display-4 text-capitalize mb-3">Latest Mining News & Updates</h2>
            <p class="lead">Stay informed with trends, equipment tips, and industry developments.</p>
        </div>
        <div class="row g-4">
            @foreach ($posts as $post)
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.{{ $loop->index + 2 }}s">
                    <div class="blog-item h-100">
                        <div class="blog-img">
                            <img src="{{ asset('files/' . $post->image) }}" class="img-fluid w-100"
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
                            <div class="d-flex align-items-center gap-2">
                                <!-- Read More Button -->
                                <a class="btn btn-secondary py-2 px-4"
                                    href="{{ route('frontend.home.showPost', $post) }}">
                                    Read More
                                </a>

                                <!-- Share Button -->
                                <button class="btn btn-primary py-2 px-4"
                                    onclick="openShareActions('{{ json_encode($post->id) }}')">
                                    <i class="fas fa-share-alt" id="shareIcon"></i> Share Post
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- View All Button -->
        <div class="text-center mt-5 wow fadeInUp" data-wow-delay="0.2s">
            <a class="btn btn-secondary py-3 px-5" href="{{ route('frontend.home.blog') }}">View All Articles</a>
        </div>
    </div>
</div>
