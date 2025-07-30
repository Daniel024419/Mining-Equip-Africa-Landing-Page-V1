<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.partials.head')
    <title>Mining Equip Africa | Projects | Index</title>
</head>

<body>
    @include('dashboard.partials.nav')


    <!-- ACTIONS -->
    <section id="actions" class="bg-light mb-4 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="#" class="btn btn-block btn-primary" data-toggle="modal" data-target="#addProjectModal">
                        <i class="fas fa-plus"></i> Add Project
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- Projects & Info -->
    <div class="card">
        <div class="card-header">
            <h4>All Projects ( {{ $projects->total()}}) </h4>
        </div>

        <table class="table table-striped table-scroll">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $index => $project)
                    <tr>
                        <td>{{ $project->id }}</td>

                        <td>
                            @if ($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                                    width="60" height="60" style="object-fit: cover;">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>

                        <td>{{ $project->title }}</td>
                        <td>{{ $project->category ?? '—' }}</td>
                        <td>{{ Str::limit($project->description, 50) }}</td>

                        <td>
                            <a href="{{ route('dashboard.projects.show', $project->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('dashboard.projects.edit', $project->id) }}"
                                class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>

                            <!-- Trigger Delete Modal -->
                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#deleteProjectModal{{ $project->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>

                           @include('dashboard.projects.delete-project-modal')
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="6" class="text-center">No projects created yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    <!-- FOOTER -->
    @include('dashboard.partials.footer')

    <!-- MODALS -->

    <!-- ADD project MODAL -->
    @include('dashboard.projects.add-projects-modal')

    @include('dashboard.partials.script')

</body>

</html>
