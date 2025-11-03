<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.partials.head')
    <title>Mining Equip Africa | Component | Edit</title>
</head>

<body>
    @include('dashboard.partials.nav')

    <!-- EDIT COMPONENT FORM -->
    <div class="card mx-4 mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Edit Component</h4>
        </div>

        <form action="{{ route('dashboard.components.update', $component->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body row">
                <!-- Name -->
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control"
                        value="{{ old('name', $component->name) }}" required>
                </div>

                <!-- Part number -->
                <div class="form-group col-md-6">
                    <label for="part_number">Part Number</label>
                    <input type="text" name="part_number" id="part_number" class="form-control"
                        value="{{ old('part_number', $component->part_number) }}">
                </div>

                <!-- Manufacturer -->
                <div class="form-group col-md-6">
                    <label for="manufacturer">Manufacturer</label>
                    <input type="text" name="manufacturer" id="manufacturer" class="form-control"
                        value="{{ old('manufacturer', $component->manufacturer) }}">
                </div>

                <!-- Condition -->
                <div class="form-group col-md-6">
                    <label for="condition">Condition</label>
                    <select name="condition" id="condition" class="form-control">
                        <option value="">Select condition</option>
                        @foreach (['New', 'Used', 'Rebuilt', 'Refurbished'] as $cond)
                            <option value="{{ $cond }}" {{ $component->condition === $cond ? 'selected' : '' }}>
                                {{ $cond }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Price -->
                <div class="form-group col-md-6">
                    <label for="price">Price (GHS)</label>
                    <input type="number" name="price" id="price" step="0.01" class="form-control"
                        value="{{ old('price', $component->price) }}">
                </div>

                <!-- Images -->
                <div class="form-group col-md-12">
                    <label for="images">Add Images (optional)</label>
                    <input type="file" name="images[]" id="images" class="form-control-file" multiple />
                    <small class="form-text text-muted">Uploading new images will be appended to existing ones.</small>

                    @if ($component->images->count())
                        <div class="mt-3 d-flex flex-wrap">
                            @foreach ($component->images as $img)
                                <div class="p-2">
                                    <img src="{{ asset('files/' . $img->path) }}" alt=""
                                        style="width:120px;height:90px;object-fit:cover;border-radius:4px;">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Description -->
                <div class="form-group col-md-12">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" rows="4" class="form-control">{{ old('description', $component->description) }}</textarea>
                </div>
            </div>

            <!-- Submit -->
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Update Component</button>
                <a href="{{ route('dashboard.components.index') }}" class="btn btn-secondary">Go Back</a>
            </div>
        </form>
    </div>

    <!-- FOOTER -->
    @include('dashboard.partials.footer')
    @include('dashboard.partials.script')

</body>

</html>
