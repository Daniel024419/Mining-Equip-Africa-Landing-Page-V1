<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.partials.head')
    <title>Mining Equip Africa | Users | Index</title>
</head>

<body>
    @include('dashboard.partials.nav')

    <!-- ACTIONS -->
    <section id="actions" class="bg-light mb-4 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="#" class="btn btn-block btn-primary" data-toggle="modal" data-target="#addUserModal">
                        <i class="fas fa-plus"></i> Add User
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- USERS & INFOS -->
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4>All Users</h4>
        </div>

        <div class="table-responsive" style="max-height: 400px;">
            <table class="table table-striped mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone ?? '—' }}</td>
                            <td>
                                <a href="{{ route('dashboard.users.show', $user->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Do you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No users created yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


    <!-- FOOTER -->
    @include('dashboard.partials.footer')

    <!-- MODALS -->

    <!-- ADD user MODAL -->
    @include('dashboard.users.add-user-modal')

    @include('dashboard.partials.script')
</body>

</html>
