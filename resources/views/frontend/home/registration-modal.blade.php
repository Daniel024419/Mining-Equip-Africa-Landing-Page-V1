<!-- Bootstrap Modal -->
<div class="modal fade" id="registrationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark border-warning">
            <div class="modal-header border-warning">
                <h5 class="modal-title text-warning">Create Account</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="registrationForm" method="POST" action="{{ route('frontend.home.registerVistor') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label text-white">Name *</label>
                        <input type="text" name="name" class="form-control bg-transparent text-white border-warning" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white">Email *</label>
                        <input type="email" name="email" class="form-control bg-transparent text-white border-warning" required>
                    </div>
                    <div class="mb-3 position-relative">
                        <label class="form-label text-white">Password *</label>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control bg-transparent text-white border-warning"
                                id="passwordField" required>
                            <button class="btn btn-outline-warning" type="button" id="togglePassword">
                                <i class="bi bi-eye-slash"></i> <!-- Bootstrap Icons (eye-slash icon) -->
                            </button>
                        </div>
                    </div>

                    <script>
                        document.getElementById('togglePassword').addEventListener('click', function() {
                            const passwordField = document.getElementById('passwordField');
                            const icon = this.querySelector('i');

                            if (passwordField.type === 'password') {
                                passwordField.type = 'text';
                                icon.classList.replace('bi-eye-slash', 'bi-eye');
                            } else {
                                passwordField.type = 'password';
                                icon.classList.replace('bi-eye', 'bi-eye-slash');
                            }
                        });
                    </script>
                    <div class="mb-3">
                        <label class="form-label text-white">Phone (Optional)</label>
                        <input type="tel" name="phone" class="form-control bg-transparent text-white border-warning">
                    </div>
                    <button type="submit" class="btn btn-warning w-100">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>
