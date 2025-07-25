<!-- Forgot Password Modal -->
<div class="modal fade" data-bs-backdrop="static" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordModalLabel"
    aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-gold text-white">
        <h5 class="modal-title" id="forgotPasswordModalLabel">Find Your Account</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- Step 1: Email/Phone Input -->
        <div id="step1">
          <p class="mb-2">Enter your email or phone to receive a verification code.</p>
          <input type="text" id="recoveryInput" class="form-control mb-3" placeholder="Email or Phone" />
          <button class="btn btn-gold btn-block" id="sendRecoveryBtn" onclick="sendRecovery()">Send Code</button>
        </div>

        <!-- Step 2: OTP Input -->
        <div id="step2" class="d-none">
          <p class="mb-2">Enter the 6-digit verification code sent to your email/phone.</p>
          <div class="d-flex justify-content-between mb-3">
            <input class="form-control text-center otp" maxlength="1" />
            <input class="form-control text-center otp" maxlength="1" />
            <input class="form-control text-center otp" maxlength="1" />
            <input class="form-control text-center otp" maxlength="1" />
            <input class="form-control text-center otp" maxlength="1" />
            <input class="form-control text-center otp" maxlength="1" />
          </div>
          <button class="btn btn-gold btn-block" id="verifyOTPBtn" onclick="verifyOTP()">Verify Code</button>
        </div>

        <div id="recoveryMessage" class="text-danger mt-2"></div>
      </div>
    </div>
  </div>
</div>
