@if ($errors->has('message'))
    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert" id="alertview">
        <i class="fas fa-exclamation-triangle fa-lg text-danger mr-2"></i>
        <div>
            {{ $errors->first('message') }}
        </div>
        <button type="button" class="btn-close ml-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->has('error'))
    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert" id="alertview">
        <i class="fas fa-exclamation-circle fa-lg text-danger mr-2"></i>
        <div>
            {{ $errors->first('error') }}
        </div>
        <button type="button" class="btn-close ml-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert" id="alertview">
        <i class="fas fa-times-circle fa-lg text-danger mr-2"></i>
        <div>
            {{ session('error') }}
        </div>
        <button type="button" class="btn-close ml-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-start" role="alert" id="alertview">
        <i class="fas fa-bug fa-lg text-danger mr-2 mt-1"></i>
        <div>
            <ul class="mb-0 pl-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <button type="button" class="btn-close ml-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
