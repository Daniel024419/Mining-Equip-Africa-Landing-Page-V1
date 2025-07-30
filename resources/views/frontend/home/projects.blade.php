<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.head')
    <title>Mining Equip Africa | Projects</title>
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
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Our Projects</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-secondary">Project</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Projects Start -->
    <div class="container-fluid project py-5 bg-dark">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <p class="text-uppercase text-warning fs-5 mb-0 fw-bold">OUR WORK</p>
                <h2 class="display-4 text-capitalize mb-3 text-white">Recent Mining Projects</h2>
                <p class="text-light">Successful equipment deployments and drilling operations across Africa</p>
            </div>
            <div class="row g-5">
                <!-- Project 1: Gold Mining -->
                @forelse ($projects as $project)
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="{{ $project->delay }}">
                        <div class="project-item border border-warning rounded-4 overflow-hidden bg-dark">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <div class="project-img h-100">
                                        <img src="{{ asset($project->image) }}" class="img-fluid h-100 w-100"
                                            alt="{{ $project->title }}" style="object-fit: cover;">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="project-content p-4">
                                        <p class="fs-5 text-warning mb-2">{{ $project->category }}</p>
                                        <a href="#"
                                            class="h4 text-white d-block mb-3">{{ $project->title }}</a>
                                        <p class="text-light mb-4">{{ $project->description }}</p>
                                        <div class="d-flex flex-wrap">
                                            @if ($project->badges)
                                              @foreach ($project->badges as $badge)
                                                <span
                                                    class="badge bg-warning text-dark me-2 mb-2">{{ $badge }}</span>
                                            @endforeach  
                                            @endif
                                            
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h2>No project yet..</h2>
                @endforelse

            </div>
        </div>
    </div>
    <!-- Projects End -->

    <!-- Footer Start -->
    @include('frontend.partials.footer')
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    @include('frontend.partials.script')
</body>

</html>
