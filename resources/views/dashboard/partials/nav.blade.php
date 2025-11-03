

<nav class="shadow-sm navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #2e2e2e;">
    <div class="container">

        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard.posts.index') }}">
            <img src="{{ asset('logo.png') }}" alt="EquipMining Africa Logo" class="mr-2" style="height: 40px;">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="mr-auto navbar-nav">
                <ul class="mr-auto navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('dashboard.posts.index') }}">
                        <i class="mr-1 fas fa-tachometer-alt text-warning"></i> Dashboard
                    </a>
                </li>

                <!-- Posts -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="postsDropdown" data-toggle="dropdown">
                        <i class="mr-1 fas fa-newspaper text-warning"></i> Posts
                    </a>
                    <div class="border-0 dropdown-menu bg-dark">
                        <a class="dropdown-item text-light" href="{{ route('dashboard.posts.index') }}">All Posts</a>
                        <a class="dropdown-item text-light" href="#">Add New</a>
                        <a class="dropdown-item text-light" href="#">Categories</a>
                    </div>
                </li>

                <!-- Services -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="servicesDropdown" data-toggle="dropdown">
                        <i class="mr-1 fas fa-cogs text-warning"></i> Services
                    </a>
                    <div class="border-0 dropdown-menu bg-dark">
                        <a class="dropdown-item text-light" href="{{ route('dashboard.services.index') }}">All Services</a>
                    </div>
                </li>

                <!-- Projects -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="projectsDropdown" data-toggle="dropdown">
                        <i class="mr-1 fas fa-project-diagram text-warning"></i> Projects
                    </a>
                    <div class="border-0 dropdown-menu bg-dark">
                        <a class="dropdown-item text-light" href="{{ route('dashboard.projects.index') }}">All Projects</a>
                    </div>
                </li>

                <!-- Equipments -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="equipmentsDropdown" data-toggle="dropdown">
                        <i class="mr-1 fas fa-industry text-warning"></i> Equipments
                    </a>
                    <div class="border-0 dropdown-menu bg-dark">
                        <a class="dropdown-item text-light" href="{{ route('dashboard.equipments.index') }}">All Equipments</a>
                    </div>
                </li>

                <!-- Components -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="componentsDropdown" data-toggle="dropdown">
                        <i class="mr-1 fas fa-tools text-warning"></i> Components
                    </a>
                    <div class="border-0 dropdown-menu bg-dark">
                        <a class="dropdown-item text-light" href="{{ route('dashboard.components.index') }}">All Components</a>
                    </div>
                </li>

                <!-- Users -->
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('dashboard.users.index') }}">
                        <i class="mr-1 fas fa-users text-warning"></i> Users
                    </a>
                </li>
            </ul>

            <ul class="ml-auto navbar-nav">
                <!-- User dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown">
                        <i class="mr-1 fas fa-user-circle text-warning"></i> {{ Auth::user()->name ?? 'User' }}
                    </a>
                    <div class="border-0 dropdown-menu dropdown-menu-right bg-dark">
                        <a class="dropdown-item text-light" href="#" data-toggle="modal" data-target="#profileModal">
                            <i class="mr-1 fas fa-user"></i> Profile
                        </a>
                        <a class="dropdown-item text-light" href="{{ route('dashboard.admin.settings') }}">
                            <i class="mr-1 fas fa-cog"></i> Settings
                        </a>
                        <div class="dropdown-divider bg-secondary"></div>
                        <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="mr-1 fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

@include('dashboard.partials.logout-modal')
@include('dashboard.global-error-handler')
@include('dashboard.global-success-handler')