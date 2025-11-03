<div class="px-0 shadow-sm container-fluid sticky-top" style="background: #000;">
    <nav class="px-4 py-3 navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <!-- Logo with Mining Branding -->
            <a href="{{ route('frontend.home.index') }}" class="gap-2 p-0 navbar-brand d-flex align-items-center">
                <img src="{{ asset('logo.png') }}" alt="Mining Equip Africa Logo" style="height: 45px; width: auto;">
                <h1 class="mb-0 text-warning" style="font-size: 1.8rem; font-weight: 700;">
                    <span class="text-white"><span class="text-warning">AFRICA</span>
                </h1>
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler border-warning" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-warning"></span>
            </button>

            <!-- Main Navigation -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="pt-2 navbar-nav ms-auto pt-lg-0">
                    <a href="{{ route('frontend.home.index') }}" class="px-3 text-white nav-item nav-link">Home</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="px-3 text-white nav-link dropdown-toggle"
                            data-bs-toggle="dropdown">Equipment</a>
                        <div class="m-0 border-0 shadow-sm dropdown-menu" style="background: #111;">
                            <a href="{{ route('frontend.home.equipments', 'all') }}"
                                class="text-white dropdown-item">All
                                Machinery</a>
                            <a href="{{ route('frontend.home.equipments', 'new') }}"
                                class="text-white dropdown-item">New
                                Machinery</a>
                            <a href="{{ route('frontend.home.equipments', 'used') }}"
                                class="text-white dropdown-item">Used Equipment</a>
                            <a href="{{ route('frontend.home.equipments', 'rental') }}"
                                class="text-white dropdown-item">Rental Fleet</a>
                            <div class="dropdown-divider border-warning"></div>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="px-3 text-white nav-link dropdown-toggle"
                            data-bs-toggle="dropdown">Components</a>
                        <div class="m-0 border-0 shadow-sm dropdown-menu" style="background: #111;">
                            <a href="{{ route('frontend.home.components', 'all') }}"
                                class="text-white dropdown-item">All
                                components</a>
                            <a href="{{ route('frontend.home.equipments', 'new') }}"
                                class="text-white dropdown-item">New
                                components</a>
                            <a href="{{ route('frontend.home.components', 'used') }}"
                                class="text-white dropdown-item">Used Components</a> 
                            <div class="dropdown-divider border-warning"></div>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="px-3 text-white nav-link dropdown-toggle"
                            data-bs-toggle="dropdown">Services</a>
                        <div class="m-0 border-0 shadow-sm dropdown-menu" style="background: #111;">
                            <a href="{{ route('frontend.home.services') }}" class="text-white dropdown-item">Drilling
                                Services</a>
                            <a href="{{ route('frontend.home.services') }}" class="text-white dropdown-item">Equipment
                                Maintenance</a>
                            <a href="{{ route('frontend.home.services') }}" class="text-white dropdown-item">Operator
                                Training</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="px-3 text-white nav-link dropdown-toggle"
                            data-bs-toggle="dropdown">Company</a>
                        <div class="m-0 border-0 shadow-sm dropdown-menu" style="background: #111;">
                            <a href="{{ route('frontend.home.about') }}" class="text-white dropdown-item">About Us</a>
                            {{-- <a href="{{ route('frontend.home.teams') }}" class="text-white dropdown-item">Our Team</a> --}}
                            <a href="{{ route('frontend.home.testimonial') }}" class="text-white dropdown-item">Client
                                Testimonials</a>
                            <a href="{{ route('frontend.home.blog') }}" class="text-white dropdown-item">Our Blog</a>
                            <a href="{{ route('frontend.home.gallery') }}" class="text-white dropdown-item">Our
                                Gallery</a>
                            <a href="{{ route('frontend.home.features') }}" class="text-white dropdown-item">Our
                                Features</a>
                            <a href="{{ route('frontend.home.projects') }}" class="text-white dropdown-item">Our
                                Projects</a>
                        </div>
                    </div>

                    <a href="{{ route('frontend.home.contacts') }}"
                        class="px-3 text-white nav-item nav-link">Contact</a>
                </div>

                <!-- Call-to-Action Buttons -->
                <div class="flex-wrap gap-2 pt-3 d-flex align-items-center pt-lg-0 ms-lg-3">
                    <!-- Language Selector Dropdown -->
                    <div class="dropdown">
                        <button class="btn btn-outline-warning dropdown-toggle d-flex align-items-center" type="button"
                            id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-language me-1"></i>
                            <span class="d-none d-md-inline">Language</span>
                        </button>
                        <ul class="mt-1 dropdown-menu dropdown-menu-end bg-dark border-warning"
                            aria-labelledby="languageDropdown">
                            <li>
                                <div id="google_translate_element" class="p-2"></div>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-warning">
                            </li>
                            <!-- Uncomment below to manually show language options -->
                            {{-- <li>
                <a class="text-white dropdown-item" href="#" onclick="doGTranslate('en|en');return false;">
                    <img src="https://flagcdn.com/w20/gb.png" class="me-2"> English
                </a>
            </li> --}}
                        </ul>
                    </div>

                    <!-- Search Button -->
                    <button class="btn btn-outline-warning " data-bs-toggle="modal"
                        data-bs-target="#searchModal">
                        <i class="fas fa-search"></i>
                    </button>

                    <!-- Call Button -->
                    <a href="tel:0244428332" class="btn btn-warning fw-bold text-dark">
                        <i class="fas fa-phone-alt me-2"></i>Call
                    </a>

                    <!-- Auth Buttons -->
                    @auth
                        <a class="btn btn-warning fw-bold text-dark"
                            href="{{ route('dashboard.auth.logout') }}">
                            <i class="fa fa-lock me-1"></i> Logout
                        </a>
                    @else
                        <a class="btn btn-warning fw-bold text-dark"
                            href="{{ route('dashboard.auth.index') }}">
                            <i class="fa fa-user me-1"></i> Login
                        </a>
                    @endauth
                </div>

            </div>

            <!-- Google Translate Script -->
            <script>
                // Load Google Translate script
                function googleTranslateElementInit() {
                    new google.translate.TranslateElement({
                        pageLanguage: 'en',
                        includedLanguages: 'en,fr,es,de,zh-CN,ar,ru,ja,pt',
                        layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                        autoDisplay: false
                    }, 'google_translate_element');
                }

                function doGTranslate(lang_pair) {
                    if (lang_pair.value) lang_pair = lang_pair.value;
                    if (lang_pair == '') return;
                    var lang = lang_pair.split('|')[1];
                    if (GTranslateGetCurrentLang() == null && lang == lang_pair.split('|')[0]) return;
                    var teCombo;
                    var sel = document.getElementsByTagName('select');
                    for (var i = 0; i < sel.length; i++)
                        if (sel[i].className.indexOf('goog-te-combo') != -1) {
                            teCombo = sel[i];
                            break;
                        }
                    if (document.getElementById('google_translate_element') == null || document.getElementById(
                            'google_translate_element').innerHTML.length == 0 || teCombo.length == 0 || teCombo.innerHTML.length ==
                        0) {
                        setTimeout(function() {
                            doGTranslate(lang_pair)
                        }, 500);
                    } else {
                        teCombo.value = lang;
                        fireEvent(teCombo, 'change');
                    }
                }

                function GTranslateGetCurrentLang() {
                    var keyValue = document.cookie.match('(^|;) ?googtrans=([^;]*)(;|$)');
                    return keyValue ? keyValue[2].split('/')[2] : null;
                }

                function fireEvent(element, event) {
                    if (document.createEventObject) {
                        var evt = document.createEventObject();
                        return element.fireEvent('on' + event, evt);
                    } else {
                        var evt = document.createEvent('HTMLEvents');
                        evt.initEvent(event, true, true);
                        return !element.dispatchEvent(evt);
                    }
                }
            </script>
            <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        </div>
    </nav>
</div>

@include('frontend.partials.search-modal')
