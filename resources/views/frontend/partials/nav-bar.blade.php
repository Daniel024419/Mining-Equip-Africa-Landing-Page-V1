<div class="container-fluid sticky-top px-0 shadow-sm" style="background: #000;">
    <nav class="navbar navbar-expand-lg navbar-dark py-3 px-4">
        <div class="container">
            <!-- Logo with Mining Branding -->
            <a href="{{ route('frontend.home.index') }}" class="navbar-brand d-flex align-items-center gap-2 p-0">
                <img src="{{ asset('logo.png') }}" alt="Mining Equip Africa Logo" style="height: 45px; width: auto;">
                <h1 class="text-warning mb-0" style="font-size: 1.8rem; font-weight: 700;">
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
                <div class="navbar-nav ms-auto pt-2 pt-lg-0">
                    <a href="{{ route('frontend.home.index') }}" class="nav-item nav-link px-3 text-white">Home</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle px-3 text-white"
                            data-bs-toggle="dropdown">Equipment</a>
                        <div class="dropdown-menu m-0 border-0 shadow-sm" style="background: #111;">
                            <a href="{{ route('frontend.home.equipments', 'all') }}" class="dropdown-item text-white">All
                                Machinery</a>
                            <a href="{{ route('frontend.home.equipments', 'new') }}" class="dropdown-item text-white">New
                                Machinery</a>
                            <a href="{{ route('frontend.home.equipments', 'used') }}"
                                class="dropdown-item text-white">Used Equipment</a>
                            <a href="{{ route('frontend.home.equipments', 'rental') }}"
                                class="dropdown-item text-white">Rental Fleet</a>
                            <div class="dropdown-divider border-warning"></div>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle px-3 text-white"
                            data-bs-toggle="dropdown">Services</a>
                        <div class="dropdown-menu m-0 border-0 shadow-sm" style="background: #111;">
                            <a href="{{ route('frontend.home.services') }}" class="dropdown-item text-white">Drilling
                                Services</a>
                            <a href="{{ route('frontend.home.services') }}" class="dropdown-item text-white">Equipment
                                Maintenance</a>
                            <a href="{{ route('frontend.home.services') }}" class="dropdown-item text-white">Operator
                                Training</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle px-3 text-white"
                            data-bs-toggle="dropdown">Company</a>
                        <div class="dropdown-menu m-0 border-0 shadow-sm" style="background: #111;">
                            <a href="{{ route('frontend.home.about') }}" class="dropdown-item text-white">About Us</a>
                            {{-- <a href="{{ route('frontend.home.teams') }}" class="dropdown-item text-white">Our Team</a> --}}
                            <a href="{{ route('frontend.home.testimonial') }}" class="dropdown-item text-white">Client
                                Testimonials</a>
                            <a href="{{ route('frontend.home.blog') }}" class="dropdown-item text-white">Our Blog</a>
                            <a href="{{ route('frontend.home.gallery') }}" class="dropdown-item text-white">Our
                                Gallery</a>
                            <a href="{{ route('frontend.home.features') }}" class="dropdown-item text-white">Our
                                Features</a>
                            <a href="{{ route('frontend.home.projects') }}" class="dropdown-item text-white">Our
                                Projects</a>
                        </div>
                    </div>

                    <a href="{{ route('frontend.home.contacts') }}"
                        class="nav-item nav-link px-3 text-white">Contact</a>
                </div>

                <!-- Call-to-Action Buttons -->
                <div class="d-flex align-items-center flex-nowrap pt-3 pt-lg-0 ms-lg-3">
                    <!-- Language Selector Dropdown -->
                    <div class="dropdown me-3">
                        <button class="btn btn-outline-warning dropdown-toggle" type="button" id="languageDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-language me-1"></i>
                            <span class="d-none d-md-inline">Language</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end bg-dark border-warning"
                            aria-labelledby="languageDropdown">
                            <li>
                                <div id="google_translate_element" class="p-2"></div>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-warning">
                            </li>
                            {{-- <li>
                                <a class="dropdown-item text-white" href="#"
                                    onclick="doGTranslate('en|en');return false;">
                                    <img src="https://flagcdn.com/w20/gb.png" alt="English" class="me-2"> English
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-white" href="#"
                                    onclick="doGTranslate('en|fr');return false;">
                                    <img src="https://flagcdn.com/w20/fr.png" alt="French" class="me-2"> Français
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-white" href="#"
                                    onclick="doGTranslate('en|es');return false;">
                                    <img src="https://flagcdn.com/w20/es.png" alt="Spanish" class="me-2"> Español
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-white" href="#"
                                    onclick="doGTranslate('en|de');return false;">
                                    <img src="https://flagcdn.com/w20/de.png" alt="German" class="me-2"> Deutsch
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-white" href="#"
                                    onclick="doGTranslate('en|zh-CN');return false;">
                                    <img src="https://flagcdn.com/w20/cn.png" alt="Chinese" class="me-2"> 中文
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-white" href="#"
                                    onclick="doGTranslate('en|ar');return false;">
                                    <img src="https://flagcdn.com/w20/sa.png" alt="Arabic" class="me-2"> العربية
                                </a>
                            </li> --}}
                        </ul>
                    </div>

                    <button class="btn btn-outline-warning py-2 px-3" data-bs-toggle="modal"
                        data-bs-target="#searchModal">
                        <i class="fas fa-search"></i>
                    </button>
                    <a href="tel:0244428332" class="btn btn-warning py-2 px-4 ms-3 fw-bold text-dark">
                        <i class="fas fa-phone-alt me-2"></i>
                    </a>
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
