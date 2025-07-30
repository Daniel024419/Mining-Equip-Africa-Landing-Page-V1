@if (session('message'))
    <div id="alertview" class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
        <i class="fas fa-check-circle fa-lg text-success mr-2"></i>
        <div>
            {{ session('message') }}
        </div>
        <button type="button" class="btn-close ml-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('success'))
    <div id="alertview" class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
        <i class="fas fa-thumbs-up fa-lg text-success mr-2"></i>
        <div>
            {{ session('success') }}
        </div>
        <button type="button" class="btn-close ml-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
