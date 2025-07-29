<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.head')
    <title>Mining Equip Africa | Contact</title>
</head>

<body class="bg-dark">

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
    <div class="container-fluid bg-dark py-5 bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('{{ asset('frontend/img/mining-contact-bg.jpg') }}') center/cover no-repeat;">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-warning display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Contact Our Mining Experts</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}" class="text-light">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#" class="text-light">Support</a></li>
                <li class="breadcrumb-item active text-warning">Contact</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Contact Start -->
    <div class="container-fluid contact py-5 bg-dark">
        <div class="container py-5">
            <div class="row g-5 mb-5">
                <!-- Contact Form -->
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                        <p class="text-uppercase text-warning fs-5 mb-0">24/7 SUPPORT</p>
                        <h2 class="display-4 text-capitalize mb-3 text-white">Equipment Inquiry</h2>
                        <p class="text-light mb-4">Get immediate assistance for equipment purchases, service requests,
                            or training programs from our mining specialists.</p>
                    </div>
                    {{-- Alert messages --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>There were some problems with your submission:</strong>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="needs-validation" action="{{ route('frontend.home.storeInquiries') }}"
                        enctype="multipart/form-data" method="POST" novalidate>
                        @csrf
                        <div class="row g-3">

                            {{-- Name --}}
                            <div class="col-md-6">
                                <div class="form-floating border border-warning bg-transparent">
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control bg-transparent text-light @error('name') is-invalid @enderror"
                                        id="name" placeholder="Your Name" required>
                                    <label for="name" class="text-light">Your Name</label>
                                    @error('name')
                                        <div class="invalid-feedback text-warning">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="col-md-6">
                                <div class="form-floating border border-warning bg-transparent">
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control bg-transparent text-light @error('email') is-invalid @enderror"
                                        id="email" placeholder="Your Email" required>
                                    <label for="email" class="text-light">Your Email</label>
                                    @error('email')
                                        <div class="invalid-feedback text-warning">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Phone --}}
                            <div class="col-md-6">
                                <div class="form-floating border border-warning bg-transparent">
                                    <input type="tel" name="phone" value="{{ old('phone') }}"
                                        class="form-control bg-transparent text-light @error('phone') is-invalid @enderror"
                                        id="phone" placeholder="Phone" required>
                                    <label for="phone" class="text-light">Phone Number</label>
                                    @error('phone')
                                        <div class="invalid-feedback text-warning">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Service --}}
                            <div class="col-md-6">
                                <div class="form-floating border border-warning bg-transparent">
                                    <select name="service" id="service"
                                        class="form-select bg-transparent text-light @error('service') is-invalid @enderror"
                                        required>
                                        <option disabled selected value="">Select Service</option>
                                        <option {{ old('service') == 'Equipment Purchase' ? 'selected' : '' }}>
                                            Equipment Purchase</option>
                                        <option {{ old('service') == 'Equipment Leasing' ? 'selected' : '' }}>Equipment
                                            Leasing</option>
                                        <option {{ old('service') == 'Drilling Services' ? 'selected' : '' }}>Drilling
                                            Services</option>
                                        <option {{ old('service') == 'Maintenance' ? 'selected' : '' }}>Maintenance
                                        </option>
                                        <option {{ old('service') == 'Operator Training' ? 'selected' : '' }}>Operator
                                            Training</option>
                                    </select>
                                    <label for="service" class="text-light">Service Needed</label>
                                    @error('service')
                                        <div class="invalid-feedback text-warning">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Message --}}
                            <div class="col-12">
                                <div class="form-floating border border-warning bg-transparent">
                                    <textarea name="message" class="form-control bg-transparent text-light @error('message') is-invalid @enderror"
                                        placeholder="Describe your mining needs" id="message" style="height: 150px" required>{{ old('message') }}</textarea>
                                    <label for="message" class="text-light">Project Details</label>
                                    @error('message')
                                        <div class="invalid-feedback text-warning">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Submit Button --}}
                            <div class="col-12">
                                <button class="btn btn-warning w-100 py-3 fw-bold text-dark" type="submit">
                                    <i class="fas fa-paper-plane me-2"></i> Submit Inquiry
                                </button>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="row g-4 align-items-stretch">
                    <!-- Map Section -->
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.4s">
                        <div class="contact-map border border-warning rounded-4 overflow-hidden h-100">
                            <iframe class="w-100" style="min-height: 500px;"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.755238226239!2d-1.773905925018757!3d5.614777994389591!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdb90a4a0b0e1e5%3A0x6f2e6b7a3a5a5a5a!2sTakoradi%2C%20Ghana!5e0!3m2!1sen!2sus!4v1694259649153!5m2!1sen!2sus"
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.5s">
                        <div class="row g-4">
                            <!-- Address -->
                            <div class="col-md-12">
                                <div class="d-flex bg-dark border border-warning rounded-4 p-4 h-100">
                                    <i class="fas fa-map-marker-alt fa-2x text-warning mt-1 me-3"></i>
                                    <div>
                                        <h5 class="text-warning">Headquarters</h5>
                                        <p class="text-light mb-0 small">P.O. Box TD 483<br>Takoradi, Ghana</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="d-flex bg-dark border border-warning rounded-4 p-4 h-100">
                                    <i class="fas fa-envelope fa-2x text-warning mt-1 me-3"></i>
                                    <div>
                                        <h5 class="text-warning">Email Us</h5>
                                        <p class="text-light mb-0 small">
                                            info@miningequipafrica.com<br>
                                            sales@miningequipafrica.com
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6">
                                <div class="d-flex bg-dark border border-warning rounded-4 p-4 h-100">
                                    <i class="fas fa-phone-alt fa-2x text-warning mt-1 me-3"></i>
                                    <div>
                                        <h5 class="text-warning">Call Us</h5>
                                        <p class="text-light mb-0 small">
                                            +233 24 442 8332<br>
                                            +233 20 067 2219
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Emergency Contact Banner -->
                <div class="row mt-5 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="col-12">
                        <div class="bg-warning rounded-4 p-4 text-center">
                            <div
                                class="d-flex flex-column flex-md-row align-items-center justify-content-center text-center text-md-start">
                                <i class="fas fa-exclamation-triangle fa-3x text-dark me-md-4 mb-3 mb-md-0"></i>
                                <div>
                                    <h3 class="text-dark mb-1">24/7 Equipment Emergency Line</h3>
                                    <h2 class="text-dark">+233 50 123 4567</h2>
                                    <p class="mb-0">For immediate technical support on active mining operations</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
    <!-- Contact End -->

    <!-- Footer Start -->
    @include('frontend.partials.footer')
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    @include('frontend.partials.script')

    <!-- Form Validation -->
    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>

</html>
