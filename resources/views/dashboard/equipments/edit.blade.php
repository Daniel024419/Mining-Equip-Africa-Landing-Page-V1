<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.partials.head')
    <title>Mining Equip Africa | Equipment | Edit</title>    
</head>

<body>
    @include('dashboard.partials.nav')

    <!-- EDIT EQUIPMENT FORM -->
    <div class="card mx-4 mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Edit Equipment</h4>
        </div>

        <form action="{{ route('dashboard.equipments.update', $equipment->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body row">
                <!-- Name -->
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $equipment->name) }}" required>
                </div>

                <!-- Year -->
                <div class="form-group col-md-6">
                    <label for="year">Year</label>
                    <input type="number" name="year" id="year" class="form-control" value="{{ old('year', $equipment->year) }}" required>
                </div>

                <!-- Category -->
                <div class="form-group col-md-6">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control" required>
                        <option value="">Select a category</option>
                        @php
                            $categories = ['Surface', 'Underground', 'Refurbished', 'Heavy Machinery', 'Light Equipment', 'Safety Gear', 'Electrical', 'Hydraulic', 'Conveyors', 'Drilling', 'Loading', 'Transport', 'Maintenance Tools'];
                        @endphp
                        @foreach ($categories as $category)
                            <option value="{{ strtolower($category) }}" {{ strtolower($category) === strtolower($equipment->category) ? 'selected' : '' }}>
                                {{ $category }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Condition -->
                <div class="form-group col-md-6">
                    <label for="condition">Condition</label>
                    <select name="condition" id="condition" class="form-control" required>
                        <option value="">Select condition</option>
                        @foreach (['new', 'used', 'refurbished'] as $cond)
                            <option value="{{ $cond }}" {{ $equipment->condition === $cond ? 'selected' : '' }}>
                                {{ ucfirst($cond) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Price -->
                <div class="form-group col-md-6">
                    <label for="price">Price (GHS)</label>
                    <input type="number" name="price" id="price" step="0.01" class="form-control" value="{{ old('price', $equipment->price) }}" required>
                </div>

                <!-- Description -->
                <div class="form-group col-md-12">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" rows="4" class="form-control" required>{{ old('description', $equipment->description) }}</textarea>
                </div>

                <!-- Image Upload -->
                <div class="form-group col-md-6">
                    <label for="image">Change Image</label>
                    <div class="custom-file">
                        <input type="file" name="image" id="image" class="custom-file-input">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                    @if ($equipment->image)
                        <div class="mt-2">
                            <img src="{{ asset('files/' . $equipment->image) }}" alt="Equipment Image" class="img-fluid rounded" style="max-height: 200px;">
                        </div>
                    @endif
                </div>
            </div>

            <!-- Submit -->
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Update Equipment</button>
                <a href="{{ route('dashboard.equipments.index') }}" class="btn btn-secondary">Go Back</a>
            </div>
        </form>
    </div>

    <!-- FOOTER -->
    @include('dashboard.partials.footer')
    @include('dashboard.partials.script')

    <script>
        // File input label update
        document.querySelector('.custom-file-input').addEventListener('change', function (e) {
            const fileName = e.target.files[0]?.name;
            e.target.nextElementSibling.innerText = fileName || 'Choose file';
        });
    </script>

</body>
</html>
