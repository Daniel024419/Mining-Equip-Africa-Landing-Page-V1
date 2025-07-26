<div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s" style="background: #000; border-top: 4px solid #FFD700;">
    <div class="container py-5">
        <div class="row g-5">
            <!-- Newsletter Section -->
            <div class="col-lg-4 col-md-6">
                <div class="footer-item">
                    <h4 class="text-white mb-4" style="color: #FFD700 !important;">Stay Updated</h4>
                    <p class="mb-4 text-light">Subscribe for the latest updates on mining equipment, industry trends, and exclusive offers.</p>
                    <div class="position-relative">
                        <input class="form-control bg-dark border-1 w-100 py-3 ps-4 text-white" type="email" placeholder="Your Email">
                        <button class="btn btn-warning position-absolute top-0 end-0 mt-1 me-1 py-2 px-3" type="button">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                    <div class="mt-4">
                        <h5 class="text-warning mb-3">Trusted By</h5>
                        <img src="https://via.placeholder.com/120x40/000000/FFD700?text=Partners" alt="Partners" class="img-fluid me-2" style="max-height: 40px;">
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6">
                <div class="footer-item">
                    <h4 class="text-warning mb-4">Quick Links</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('frontend.home.index') }}" class="text-light hover-gold"><i class="fas fa-angle-right me-2 text-warning"></i> Home</a></li>
                        <li class="mb-2"><a href="{{ route('frontend.home.services') }}" class="text-light hover-gold"><i class="fas fa-angle-right me-2 text-warning"></i> Services</a></li>
                        <li class="mb-2"><a href="{{ route('frontend.home.about') }}" class="text-light hover-gold"><i class="fas fa-angle-right me-2 text-warning"></i> About Us</a></li>
                        <li class="mb-2"><a href="{{ route('frontend.home.projects') }}" class="text-light hover-gold"><i class="fas fa-angle-right me-2 text-warning"></i> Projects</a></li>
                        <li class="mb-2"><a href="{{ route('frontend.home.contacts') }}" class="text-light hover-gold"><i class="fas fa-angle-right me-2 text-warning"></i> Contact</a></li>
                    </ul>
                </div>
            </div>

            <!-- Services -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="text-warning mb-4">Our Services</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-light hover-gold"><i class="fas fa-angle-right me-2 text-warning"></i> Equipment Sales & Leasing</a></li>
                        <li class="mb-2"><a href="#" class="text-light hover-gold"><i class="fas fa-angle-right me-2 text-warning"></i> Drilling Services (RC, Diamond, Blast)</a></li>
                        <li class="mb-2"><a href="#" class="text-light hover-gold"><i class="fas fa-angle-right me-2 text-warning"></i> Equipment Purchasing</a></li>
                        <li class="mb-2"><a href="#" class="text-light hover-gold"><i class="fas fa-angle-right me-2 text-warning"></i> Mining Training Programs</a></li>
                        <li class="mb-2"><a href="#" class="text-light hover-gold"><i class="fas fa-angle-right me-2 text-warning"></i> Logistics & Transport</a></li>
                    </ul>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="text-warning mb-4">Contact Us</h4>
                    <ul class="list-unstyled text-light">
                        <li class="mb-3"><i class="fas fa-map-marker-alt me-3 text-warning"></i> P.O. Box TD 483, Takoradi, Ghana</li>
                        <li class="mb-3"><i class="fas fa-envelope me-3 text-warning"></i> info@miningequipafrica.com</li>
                        <li class="mb-3"><i class="fas fa-phone me-3 text-warning"></i> +233 24 442 8332</li>
                        <li class="mb-3"><i class="fas fa-phone me-3 text-warning"></i> +233 20 067 2219</li>
                        <li class="mb-3"><i class="fas fa-phone me-3 text-warning"></i> +233 55 324 7728</li>
                        <li class="mb-3"><i class="fas fa-phone me-3 text-warning"></i> OFFICE 0312291486</li>
                    </ul>
                    <div class="social-icons mt-4">
                        <a href="#" class="btn btn-dark btn-square rounded-circle me-2 btn-outline-warning"><i class="fab fa-facebook-f text-warning"></i></a>
                        <a href="#" class="btn btn-dark btn-square rounded-circle me-2 btn-outline-warning"><i class="fab fa-linkedin-in text-warning"></i></a>
                        <a href="#" class="btn btn-dark btn-square rounded-circle me-2 btn-outline-warning"><i class="fab fa-instagram text-warning"></i></a>
                        <a href="#" class="btn btn-dark btn-square rounded-circle me-2 btn-outline-warning"><i class="fab fa-youtube text-warning"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Copyright Section -->
<div class="container-fluid copyright py-3" style="background: #111;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <span class="text-light">© <span class="text-warning">{{ date('Y') }}</span> Mining Equip Africa. All Rights Reserved.</span>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <span class="text-light">Designed by <a href="https://dndnextgenerationtechnology.com" class="text-warning hover-underline">D&D NextGen Technology</a></span>
            </div>
        </div>
    </div>
</div>

<!-- Back to Top Button -->
<a href="#" class="btn btn-warning btn-lg-square back-to-top rounded-circle"><i class="fas fa-arrow-up text-dark"></i></a>

<!-- Custom CSS for Hover Effects -->
<style>
    .hover-gold:hover {
        color: #FFD700 !important;
        text-decoration: none;
    }
    .hover-underline:hover {
        text-decoration: underline;
    }
    .btn-square {
        width: 40px;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
</style>