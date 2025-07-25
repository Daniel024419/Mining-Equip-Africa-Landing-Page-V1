<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PasswordResetOtp;
use App\Models\User;
use App\Service\SMSServiceInterface;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ForgotPasswordController extends Controller
{
    public function __construct(private SMSServiceInterface $sMSServiceInterface) {}


    // Step 1: Send OTP    
    /**
     * sendCode
     *
     * @param  mixed $request
     * @return void
     */
    public function sendCode(Request $request)
    {
        $request->validate([
            'identifier' => 'required|string',
        ]);

        $identifier = $request->identifier;
        $otp = rand(100000, 999999);
        $user = User::query()->where('email', $identifier)->orWhere('phone', $identifier)->first();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'The identifier does not match our records,please try again'], 500);
        }
        try {
            DB::beginTransaction();
            // Delete previous unverified codes
            PasswordResetOtp::where('identifier', $identifier)->delete();

            // Store OTP
            PasswordResetOtp::create([
                'identifier' => $identifier,
                'otp' => $otp,
                'expires_at' => now()->addMinutes(10),
            ]);

            // TODO: Send OTP via SMS or Email
            if (filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
                // Send by email
                Mail::raw("Your Mining EquipAfrica OTP code is: {$otp}", function ($message) use ($identifier) {
                    $message->to($identifier)
                        ->subject('EquipAfrica Password Reset OTP');
                });
            } else {
                $this->sMSServiceInterface->sendSms($identifier, "Your Mining EquipAfrica OTP is: {$otp}");
            }
            Auth::login($user);

            DB::commit();
            return response()->json(['success' => true, 'message' => 'OTP sent']);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'OTP failed,please try again'], 500);
        }
    }

    // Step 2: Verify OTP    
    /**
     * verifyCode
     *
     * @param  mixed $request
     * @return void
     */
    public function verifyCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'identifier' => 'required|string',
            'code' => 'required|string|size:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Invalid input']);
        }

        $record = PasswordResetOtp::query()->where('identifier', $request->identifier)
            ->where('otp', $request->code)
            ->where('verified', false)
            ->where('expires_at', '>', now())
            ->first();

        if (!$record) {
            return response()->json(['success' => false, 'message' => 'Invalid or expired code']);
        }
        try {
            DB::beginTransaction();
            $record->update(['verified' => true]);
            DB::commit();
            return response()->json(['success' => true, 'message' => 'OTP verified'], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'OTP not verified'], 500);
        }
    }

    /**
     * updateAccount
     *
     * @return void
     */
    public function recoverAccount()
    {
        return view('auth.account-recovery');
    }
    /**
     * resetPassword
     *
     * @param  Request $request
     * @return void
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Find the user by email or phone
        /** @var User $user */
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found.'
            ], 404);
        }

        // Check if OTP was verified
        $otpRecord = PasswordResetOtp::query()
            ->orWhere('identifeier', $user->phone)
            ->where('identifeier', $user->email)
            ->where('verified', true)
            ->latest()
            ->first();

        if (!$otpRecord) {
            return response()->json([
                'success' => false,
                'message' => 'OTP not verified or expired.'
            ], 403);
        }

        try {
            DB::beginTransaction();
            // Update password
            $user->password = trim($request->password);
            $user->save();

            // Invalidate OTP
            $otpRecord->delete();
            Auth::logout();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Password reset successful. You can now log in.'
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Failed to update password,please try again'], 500);
        }
    }
}
