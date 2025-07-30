

<nav class="navbar navbar-expand-lg navbar-dark shadow-sm sticky-top" style="background-color: #2e2e2e;">
    <div class="container">

        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard.posts.index') }}">
            <img src="{{ asset('logo.png') }}" alt="EquipMining Africa Logo" class="mr-2" style="height: 40px;">
            <span class="font-weight-bold text-warning" style="font-size: 1.35rem;">Equip<span class="text-light">Mining</span> Africa</span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav mr-auto">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('dashboard.posts.index') }}">
                        <i class="fas fa-tachometer-alt text-warning mr-1"></i> Dashboard
                    </a>
                </li>

                <!-- Posts -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="postsDropdown" data-toggle="dropdown">
                        <i class="fas fa-newspaper text-warning mr-1"></i> Posts
                    </a>
                    <div class="dropdown-menu bg-dark border-0">
                        <a class="dropdown-item text-light" href="{{ route('dashboard.posts.index') }}">All Posts</a>
                        <a class="dropdown-item text-light" href="#">Add New</a>
                        <a class="dropdown-item text-light" href="#">Categories</a>
                    </div>
                </li>

                <!-- Services -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="servicesDropdown" data-toggle="dropdown">
                        <i class="fas fa-cogs text-warning mr-1"></i> Services
                    </a>
                    <div class="dropdown-menu bg-dark border-0">
                        <a class="dropdown-item text-light" href="{{ route('dashboard.services.index') }}">All Services</a>
                    </div>
                </li>

                <!-- Projects -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="projectsDropdown" data-toggle="dropdown">
                        <i class="fas fa-project-diagram text-warning mr-1"></i> Projects
                    </a>
                    <div class="dropdown-menu bg-dark border-0">
                        <a class="dropdown-item text-light" href="{{ route('dashboard.projects.index') }}">All Projects</a>
                    </div>
                </li>

                <!-- Equipments -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="equipmentsDropdown" data-toggle="dropdown">
                        <i class="fas fa-industry text-warning mr-1"></i> Equipments
                    </a>
                    <div class="dropdown-menu bg-dark border-0">
                        <a class="dropdown-item text-light" href="{{ route('dashboard.equipments.index') }}">All Equipments</a>
                    </div>
                </li>

                <!-- Users -->
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('dashboard.users.index') }}">
                        <i class="fas fa-users text-warning mr-1"></i> Users
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <!-- User dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown">
                        <i class="fas fa-user-circle text-warning mr-1"></i> {{ Auth::user()->name ?? 'User' }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right bg-dark border-0">
                        <a class="dropdown-item text-light" href="#" data-toggle="modal" data-target="#profileModal">
                            <i class="fas fa-user mr-1"></i> Profile
                        </a>
                        <a class="dropdown-item text-light" href="{{ route('dashboard.admin.settings') }}">
                            <i class="fas fa-cog mr-1"></i> Settings
                        </a>
                        <div class="dropdown-divider bg-secondary"></div>
                        <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt mr-1"></i> Logout
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