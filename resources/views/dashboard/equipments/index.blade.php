<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.partials.head')
    <title>Mining Equip Africa | equipments | Equipments</title>
</head>

<body>
    @include('dashboard.partials.nav')


    <!-- ACTIONS -->
    <section id="actions" class="bg-light mb-4 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="#" class="btn btn-block btn-primary" data-toggle="modal"
                        data-target="#addEquipmentModal">
                        <i class="fas fa-plus"></i> Add Equipments
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- equipments & Info -->
    <div class="card">
        <div class="card-header">
            <h4>All Equipments</h4>
        </div>

        <table class="table table-striped table-scroll">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Condition</th>
                    <th>Year</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($equipments as $index => $equipment)
                    <tr>
                        <td>{{ $index + 1 }}</td>

                        <td>
                            @if ($equipment->image)
                                <img src="{{ asset('storage/' . $equipment->image) }}" alt="{{ $equipment->name }}"
                                    width="60" height="60" style="object-fit: cover;">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>

                        <td>{{ $equipment->name }}</td>
                        <td>{{ $equipment->category ?? '—' }}</td>
                        <td>{{ $equipment->condition ?? '—' }}</td>
                        <td>{{ $equipment->year ?? '—' }}</td>
                        <td>¢{{ number_format($equipment->price, 2) }}</td>

                        <td>
                            <a href="{{ route('dashboard.equipments.show', $equipment->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('dashboard.equipments.edit', $equipment->id) }}"
                                class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('dashboard.equipments.destroy', $equipment->id) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Do you want to delete this equipment?');">
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
                        <td colspan="9" class="text-center">No equipments created yet.</td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>


    <!-- FOOTER -->
    @include('dashboard.partials.footer')

    <!-- MODALS -->

    <!-- ADD equipment MODAL -->
    @include('dashboard.equipments.add-equipment-modal')

    @include('dashboard.partials.script')

</body>

</html>
