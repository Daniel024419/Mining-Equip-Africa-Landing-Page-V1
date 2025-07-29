<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.head')
    <title>Mining Equip Africa | Home</title>
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

    <!-- Carousel Start -->
    @include('frontend.home.partials.carrosel')
    <!-- Carousel End -->

    <!-- About Start -->
    @include('frontend.home.partials.about')
    <!-- About End -->

    <!-- Features Start -->
    @include('frontend.home.partials.features')
    <!-- Features End -->

    <!-- Services Start -->
    @include('frontend.home.partials.services')
    <!-- Services End -->

    <!-- Fact Counter -->
    @include('frontend.home.partials.fact')
    <!-- Fact Counter -->

    <!-- Projects Start -->
    @include('frontend.home.partials.projects')
    <!-- Projects End -->

    <!-- Team Start -->
    {{-- @include('frontend.home.partials.team') --}}
    <!-- Team End -->

    <!-- Blog Start -->
    @include('frontend.home.partials.blog')
    <!-- Blog End -->

    <!-- Testimonial Start -->
    @include('frontend.home.partials.testimonial')
    <!-- Testimonial End -->

    <!-- Footer Start -->
    @include('frontend.partials.footer')
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    @include('frontend.partials.script')
</body>

</html>
