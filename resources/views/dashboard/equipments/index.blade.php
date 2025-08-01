<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.partials.head')
    <title>Mining Equip Africa | equipments | Equipments</title>
</head>

<body>
    @include('dashboard.partials.nav')

    <!-- equipments & Info -->
    <div class="card">
        <div class="card-header" style="display: flex;justify-content:space-between" style="display: flex;justify-content:space-between">
            <h4>All Equipments ( {{$equipments->total()}}) </h4>
            <a href="#" style="width: 200px" class="btn btn-block btn-primary" data-toggle="modal"
                data-target="#addEquipmentModal">
                <i class="fas fa-plus"></i> Add Equipments
            </a>
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
                        <td style="width: 90px;">{{ $equipment->id }}</td>

                        <td>
                            @if ($equipment->image)
                                <img src="{{ asset('files/' . $equipment->image) }}" alt="{{ $equipment->name }}"
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
                            <a href="{{ route('dashboard.equipments.show', $equipment) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('dashboard.equipments.edit', $equipment) }}"
                                class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>

                            <!-- Delete Button Trigger -->
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteEquipmentModal-{{ $equipment->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>

                            @include('dashboard.equipments.delete-equipment-modal')
                        </td>
                    </tr>


                @empty
                    <tr>
                        <td colspan="9" class="text-center">No equipments created yet.</td>
                    </tr>
                @endforelse
            </tbody>

        </table>

        <!-- Pagination -->
        <div class="row mt-5 wow fadeInUp mt-3 justify-content-center" data-wow-delay="0.3s">
            {{ $equipments->links('pagination::bootstrap-4') }}
        </div>
    </div>


    <!-- FOOTER -->
    @include('dashboard.partials.footer')

    <!-- MODALS -->

    <!-- ADD equipment MODAL -->
    @include('dashboard.equipments.add-equipment-modal')

    @include('dashboard.partials.script')

</body>

</html>
