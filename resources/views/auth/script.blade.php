 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous">
 </script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>

 <script>
     function sendRecovery() {
         const value = document.getElementById("recoveryInput").value.trim();
         const message = document.getElementById("recoveryMessage");
         message.textContent = '';
         const verifyOTPBtn = document.getElementById('verifyOTPBtn');

         if (!value) {
             message.textContent = "Please enter your email or phone.";
             return;
         }
         verifyOTPBtn.disabled = true;
         verifyOTPBtn.innerText = 'Loading...';

         fetch("{{ route('auth.sendCode') }}", {
                 method: 'POST',
                 headers: {
                     'Content-Type': 'application/json',
                     'X-CSRF-TOKEN': "{{ csrf_token() }}",
                     "Accept": 'application/json'
                 },
                 body: JSON.stringify({
                     identifier: value
                 })
             })
             .then(res => res.json())
             .then(data => {
                 if (data.success) {
                     document.getElementById("step1").classList.add("d-none");
                     document.getElementById("step2").classList.remove("d-none");
                 } else {
                     message.textContent = data.message || "Account not found.";
                 }
                 verifyOTPBtn.disabled = false;
                 verifyOTPBtn.innerText = 'Send Code';
             })
             .catch(() => {
                 message.textContent = "An error occurred. Try again.";
                 verifyOTPBtn.disabled = false;
                 verifyOTPBtn.innerText = 'Send Code';
             });
     }

     function verifyOTP() {
         const otpInputs = document.querySelectorAll(".otp");
         const code = Array.from(otpInputs).map(i => i.value).join('');
         const identifier = document.getElementById("recoveryInput").value.trim();
         const message = document.getElementById("recoveryMessage");
         const sendRecoveryBtn = document.getElementById('sendRecoveryBtn');

         if (code.length !== 6) {
             message.textContent = "Enter all 6 digits.";
             return;
         }
         sendRecoveryBtn.disabled = true;
         sendRecoveryBtn.innerText = 'Loading...';

         fetch("{{ route('auth.verifyCode') }}", {
                 method: 'POST',
                 headers: {
                     'Content-Type': 'application/json',
                     'X-CSRF-TOKEN': "{{ csrf_token() }}",
                     "Accept": 'application/json'
                 },
                 body: JSON.stringify({
                     identifier: identifier,
                     code: code
                 })
             })
             .then(res => res.json())
             .then(data => {
                 if (data.success) {
                     // Redirect to change password page
                     window.location.href = "{{ route('auth.recoverAccount') }}";
                 } else {
                     message.textContent = data.message || "Invalid code.";
                 }
                 sendRecoveryBtn.disabled = false;
                 sendRecoveryBtn.innerText = 'Verify Code';
             })
             .catch(() => {
                 message.textContent = "Something went wrong.";
                 sendRecoveryBtn.disabled = false;
                 sendRecoveryBtn.innerText = 'Verify Code';
             });
     }

     // Auto focus next OTP input
     document.addEventListener('input', function(e) {
         if (e.target.classList.contains('otp')) {
             if (e.target.value.length === 1) {
                 const next = e.target.nextElementSibling;
                 if (next && next.classList.contains('otp')) next.focus();
             }
         }
     });
 </script>

 <script>
     // Show current year
     document.getElementById('year').textContent = `© ${new Date().getFullYear()} MiningEquipAfrica`;

     // Toggle password visibility
     function togglePassword() {
         const passwordInput = document.getElementById('password');
         const toggleIcon = document.getElementById('toggleIcon');

         if (passwordInput.type === 'password') {
             passwordInput.type = 'text';
             toggleIcon.classList.remove('fa-eye');
             toggleIcon.classList.add('fa-eye-slash');
         } else {
             passwordInput.type = 'password';
             toggleIcon.classList.remove('fa-eye-slash');
             toggleIcon.classList.add('fa-eye');
         }
     }

     // Disable button on form submit
     document.getElementById('loginForm').addEventListener('submit', function(e) {
         const btn = document.getElementById('loginBtn');
         btn.disabled = true;
         btn.innerText = 'Loading...';
     });
 </script>
