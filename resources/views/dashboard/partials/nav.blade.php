<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        
        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard.posts.index') }}"
            style="font-family: 'Poppins', sans-serif;">
            <img src="{{ asset('logo.png') }}" alt="EquipMining Africa Logo" class="mr-2" style="height: 40px;">
            <span class="font-weight-bold text-dark" style="font-size: 1.25rem; letter-spacing: 0.5px;">
                <span style="color: #e6b800;">Equip</span>Mining Africa
            </span>
        </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <!-- Left-side nav links -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link active text-dark" href="dashboard.html">
                        <i class="fas fa-tachometer-alt mr-1 text-primary"></i> Dashboard
                    </a>
                </li>

                <!-- Blog Posts -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="postsDropdown" role="button"
                        data-toggle="dropdown">
                        <i class="fas fa-edit mr-1 text-primary"></i> Posts
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="posts.html">All Posts</a>
                        <a class="dropdown-item" href="add-post.html">Add New</a>
                        <a class="dropdown-item" href="categories.html">Categories</a>
                    </div>
                </li>

                <!-- Services -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="servicesDropdown" role="button"
                        data-toggle="dropdown">
                        <i class="fas fa-concierge-bell mr-1 text-primary"></i> Services
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="services.html">All Services</a>
                        <a class="dropdown-item" href="add-service.html">Add Service</a>
                    </div>
                </li>

                <!-- Projects -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="projectsDropdown" role="button"
                        data-toggle="dropdown">
                        <i class="fas fa-project-diagram mr-1 text-primary"></i> Projects
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="projects.html">All Projects</a>
                        <a class="dropdown-item" href="add-project.html">Add Project</a>
                    </div>
                </li>

                <!-- Users -->
                <li class="nav-item">
                    <a class="nav-link text-dark" href="users.html">
                        <i class="fas fa-users mr-1 text-primary"></i> Users
                    </a>
                </li>
            </ul>

            <!-- Right-side user menu -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown">
                        <i class="fas fa-user-circle mr-1 text-primary"></i> Gideon
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="profile.html">
                            <i class="fas fa-user mr-1"></i> Profile
                        </a>
                        <a class="dropdown-item" href="settings.html">
                            <i class="fas fa-cog mr-1"></i> Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="login.html">
                            <i class="fas fa-sign-out-alt mr-1"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
