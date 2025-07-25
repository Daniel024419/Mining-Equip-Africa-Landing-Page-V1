<!DOCTYPE html>
<html lang="en">

<head>
    <title>Recovery - Mining Equip Africa</title>
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
                <form id="resetPasswordForm" enctype="multipart/form-data" action="POST">
                    @csrf
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <div class="input-group">
                            <input name="password" type="password" id="password" class="form-control" required />
                            <div class="input-group-append">
                                <span class="input-group-text password-toggle"
                                    onclick="togglePassword('password', 'toggleIcon1')">
                                    <i id="toggleIcon1" class="fas fa-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <div class="input-group">
                            <input name="password_confirmation" type="password" id="password_confirmation"
                                class="form-control" required />
                            <div class="input-group-append">
                                <span class="input-group-text password-toggle"
                                    onclick="togglePassword('password_confirmation', 'toggleIcon2')">
                                    <i id="toggleIcon2" class="fas fa-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div id="messageBox" class="mt-2 text-danger"></div>

                    <button type="submit" id="resetPasswordBtn" class="btn btn-primary btn-block mt-3">Reset
                        Password</button>
                </form>
            </div>


        </div>

        <div id="year" class="text-center mt-3 text-gold"></div>
    </div>

    @include('auth.forgotPasswordModal')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const resetPasswordForm = document.getElementById("resetPasswordForm");
            const resetPasswordBtn = document.getElementById('resetPasswordBtn');

            resetPasswordForm.addEventListener("submit", function(e) {
                e.preventDefault();

                resetPasswordBtn.disabled = true;
                resetPasswordBtn.innerText = 'Waiting...';

                const password = resetPasswordForm.querySelector("[name='password']").value.trim();
                const passwordConfirm = resetPasswordForm.querySelector("[name='password_confirmation']")
                    .value.trim();
                const messageBox = document.getElementById("messageBox");

                messageBox.textContent = "";

                if (password !== passwordConfirm) {
                    messageBox.textContent = "Passwords do not match.";
                    return;
                }

                fetch("{{ route('auth.resetPassword') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Accept": 'application/json'
                        },
                        body: JSON.stringify({
                            password: password,
                            password_confirmation: passwordConfirm
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            messageBox.textContent = data.message || "Password reset successful.";
                            messageBox.style.color = "green";
                            setTimeout(() => {
                                window.location.href = "{{ route('dashboard.posts.index') }}";
                            }, 2000);
                        } else {
                            messageBox.textContent = data.message || "Failed to reset password.";
                            messageBox.style.color = "red";
                        }
                        resetPasswordBtn.disabled = false;
                        resetPasswordBtn.innerText = 'Reset Password';
                    })
                    .catch(() => {
                        messageBox.textContent = "An error occurred. Please try again.";
                        messageBox.style.color = "red";
                        resetPasswordBtn.disabled = false;
                        resetPasswordBtn.innerText = 'Reset Password';
                    });
            });


        });
    </script>

    <script>
        function togglePassword(fieldId, iconId) {
            const input = document.getElementById(fieldId);
            const icon = document.getElementById(iconId);

            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>

</body>

</html>
