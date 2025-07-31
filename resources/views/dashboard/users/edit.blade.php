<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.partials.head')
    <title>Mining Equip Africa | User | Edit</title>    
</head>

<body>
    @include('dashboard.partials.nav')

    <!-- USER EDIT CARD -->
    <div class="card mx-4 mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Edit User</h4>
        </div>

        <form action="{{ route('dashboard.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body row">
                <!-- Name -->
                <div class="form-group col-md-6">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" class="form-control" 
                           value="{{ old('name', $user->name) }}" required>
                </div>

                <!-- Email -->
                <div class="form-group col-md-6">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control" 
                           value="{{ old('email', $user->email) }}" required>
                </div>

                <!-- Phone -->
                <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control"
                           value="{{ old('phone', $user->phone) }}">
                </div>

            </div>

            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Update User</button>
                <a href="{{ route('dashboard.users.index') }}" class="btn btn-secondary">Go Back</a>
            </div>
        </form>
    </div>

    <!-- FOOTER -->
    @include('dashboard.partials.footer')
    @include('dashboard.partials.script')

</body>

</html>
