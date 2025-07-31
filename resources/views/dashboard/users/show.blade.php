<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.partials.head')
    <title>Mining Equip Africa | User | Show</title>    
</head>

<body>
    @include('dashboard.partials.nav')

    <!-- USER DETAILS CARD -->
    <div class="card mx-4 mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Show User</h4>
        </div>

        <div class="card-body row">
            <!-- Name -->
            <div class="col-md-6 mb-3">
                <h6 class="text-muted">Name</h6>
                <p class="mb-0">{{ $user->name }}</p>
            </div>

            <!-- Email -->
            <div class="col-md-6 mb-3">
                <h6 class="text-muted">Email</h6>
                <p class="mb-0">{{ $user->email }}</p>
            </div>

            <!-- Phone -->
            <div class="col-md-6 mb-3">
                <h6 class="text-muted">Phone</h6>
                <p class="mb-0">{{ $user->phone ?? 'N/A' }}</p>
            </div>

            <!-- Type -->
            <div class="col-md-6 mb-3">
                <h6 class="text-muted">User Type</h6>
                <p class="mb-0">{{ ucfirst($user->type) }}</p>
            </div>
        </div>

        <div class="card-footer text-right">
            <a href="{{ route('dashboard.users.index') }}" class="btn btn-secondary">Go Back</a>
        </div>
    </div>

    <!-- FOOTER -->
    @include('dashboard.partials.footer')
    @include('dashboard.partials.script')

</body>

</html>
