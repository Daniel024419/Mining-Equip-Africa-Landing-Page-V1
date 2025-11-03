<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.partials.head')
    <title>Mining Equip Africa | components | Components</title>
</head>

<body>
    @include('dashboard.partials.nav')

    <!-- components & Info -->
    <div class="card">
        <div class="card-header" style="display: flex;justify-content:space-between">
            <h4>All Components ( {{ $components->total() }}) </h4>
            <a href="#" style="width: 200px" class="btn btn-block btn-primary" data-toggle="modal"
                data-target="#addComponentModal">
                <i class="fas fa-plus"></i> Add Component
            </a>
        </div>

        <table class="table table-striped table-scroll">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Part Number</th>
                    <th>Manufacturer</th>
                    <th>Condition</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($components as $index => $component)
                    <tr>
                        <td style="width: 90px;">{{ $component->id }}</td>

                        <td>
                            @php $first = $component->images()->first(); @endphp
                            @if ($first)
                                <img src="{{ asset('files/' . $first->path) }}" alt="{{ $component->name }}"
                                    width="60" height="60" style="object-fit: cover;">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>

                        <td>{{ $component->name }}</td>
                        <td>{{ $component->part_number ?? '—' }}</td>
                        <td>{{ $component->manufacturer ?? '—' }}</td>
                        <td>{{ $component->condition ?? '—' }}</td>
                        <td>{{ $component->price ? '¢' . number_format($component->price, 2) : '—' }}</td>

                        <td>
                            <a href="{{ route('dashboard.components.show', $component) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('dashboard.components.edit', $component) }}"
                                class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>

                            <!-- Delete Button Trigger -->
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteComponentModal-{{ $component->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>

                            @include('dashboard.components.delete-component-modal')
                        </td>
                    </tr>


                @empty
                    <tr>
                        <td colspan="9" class="text-center">No components created yet.</td>
                    </tr>
                @endforelse
            </tbody>

        </table>

        <!-- Pagination -->
        <div class="row mt-5 wow fadeInUp mt-3 justify-content-center" data-wow-delay="0.3s">
            {{ $components->links('pagination::bootstrap-4') }}
        </div>
    </div>


    <!-- FOOTER -->
    @include('dashboard.partials.footer')

    <!-- MODALS -->

    <!-- ADD component MODAL -->
    @include('dashboard.components.add-component-modal')

    @include('dashboard.partials.script')

</body>

</html>
