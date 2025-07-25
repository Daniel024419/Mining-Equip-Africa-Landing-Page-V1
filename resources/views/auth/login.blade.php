<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login - Mining Equip Africa</title>
    @include('dashboard.partials.head')
    @include('auth.style')
</head>

<body>
    <div class="login-container">
        <div class="card shadow-sm">
            <div class="card-header text-center bg-gold text-white">
                <h4>EquipAfrica Login</h4>
            </div>
            <div class="card-body">
                <form id="loginForm" autocomplete="off" method="POST" action="{{route('dashboard.auth.login')}}" enctype="multipart/form-data">
                   @csrf
                    <div class="form-group">
                        <label for="email">Email or Phone</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input name="identifier" type="email" class="form-control" placeholder="Email or Phone"
                                required value="{{ old('identifier') }}" />
                            @error('identifier')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input name="password" type="password" autocomplete="off" id="password" class="form-control"
                                placeholder="Enter password" required />
                            <div class="input-group-append">
                                <span class="input-group-text password-toggle" onclick="togglePassword()">
                                    <i id="toggleIcon" class="fas fa-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <button type="submit" id="loginBtn" class="btn btn-gold btn-block">Login</button>

                    <div class="text-right mt-2">
                        <a href="#" class="text-muted" data-toggle="modal"
                            data-target="#forgotPasswordModal">Forgot Password?</a>
                    </div>

                    <hr>

                    <div class="text-center">
                        <p class="mb-2">Or login with</p>
                        <div class="d-flex justify-content-center">
                            <a href="{{route('auth.google')}}" class="btn btn-light border mr-2">
                                <i class="fab fa-google text-danger"></i> Google
                            </a>
                            <a href="#" class="btn btn-light border">
                                <i class="fab fa-facebook text-primary"></i> Facebook
                            </a>
                        </div>
                    </div>
                    @error('error')
                        <div class="invalid-feedback">
                            <div>
                                {{ $message }}
                            </div>
                        </div>
                    @enderror


                    @if (session('error'))
                        <div class="invalid-feedback">
                            <div>
                                {{ session('error') }}
                            </div>
                        </div>
                    @endif
                </form>
            </div>

        </div>

        <div id="year" class="text-center mt-3 text-gold"></div>
    </div>

    @include('auth.forgotPasswordModal')
    @include('auth.script')
</body>

</html>
