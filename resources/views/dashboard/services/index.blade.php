<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.partials.head')
    <title>Mining Equip Africa | Services | Index</title>
</head>

<body>
    @include('dashboard.partials.nav')

    <!-- ACTIONS -->
    <section id="actions" class="bg-light mb-4 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="#" class="btn btn-block btn-primary" data-toggle="modal" data-target="#addServiceModal">
                        <i class="fas fa-plus"></i> Add Services
                    </a>
                </div>
            </div>
        </div>
    </section>


    <div class="card">
        <div class="card-header">
            <h4>All services ( {{ $services->total()}} )</h4>
        </div>

        <table class="table table-striped table-scroll">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($services as $index => $service)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $service->title }}</td>
                        <td>{{ Str::limit($service->description, 50) }}</td>
                        <td>{{ $service->category ?? '—' }}</td>

                        <td>
                            @if ($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}" alt="Image"
                                    style="height: 40px;">
                            @else
                                —
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('dashboard.services.show', $service->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('dashboard.services.edit', $service->id) }}"
                                class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>

                            <!-- Trigger Delete Modal -->
                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#deleteServiceModal{{ $service->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>

                           @include('dashboard.services.delete-services-modal')
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="7" class="text-center">No services created yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    <!-- FOOTER -->
    @include('dashboard.partials.footer')

    @include('dashboard.partials.script')

    @include('dashboard.services.add-services-modal')
</body>

</html>
