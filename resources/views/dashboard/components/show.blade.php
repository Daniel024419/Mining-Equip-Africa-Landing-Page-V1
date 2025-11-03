<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.partials.head')
    <title>Mining Equip Africa | Component | Show</title>
</head>

<body>
    @include('dashboard.partials.nav')

    <div class="card mx-4 mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Component Details</h4>
            <div>
                <a href="{{ route('dashboard.components.edit', $component) }}" class="btn btn-sm btn-warning">Edit</a>
                <a href="{{ route('dashboard.components.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>{{ $component->name }}</h5>
                    <p><strong>Part Number:</strong> {{ $component->part_number ?? '—' }}</p>
                    <p><strong>Manufacturer:</strong> {{ $component->manufacturer ?? '—' }}</p>
                    <p><strong>Condition:</strong> {{ $component->condition ?? '—' }}</p>
                    <p><strong>Price:</strong> {{ $component->price ? '¢' . number_format($component->price, 2) : '—' }}
                    </p>
                    <p><strong>Description:</strong></p>
                    <p>{{ $component->description ?? '—' }}</p>
                </div>

                <div class="col-md-6">
                    <h6>Images</h6>
                    @if ($component->images->count())
                        <div class="d-flex flex-wrap">
                            @foreach ($component->images as $img)
                                <div class="p-2">
                                    <img src="{{ asset('files/' . $img->path) }}" alt=""
                                        style="width:220px;height:160px;object-fit:cover;border-radius:4px;">
                                    @if ($img->caption)
                                        <div class="mt-1 small text-muted">{{ $img->caption }}</div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted">No images available.</p>
                    @endif
                </div>
            </div>
        </div>

    </div>

    @include('dashboard.partials.footer')
    @include('dashboard.partials.script')

</body>

</html>
