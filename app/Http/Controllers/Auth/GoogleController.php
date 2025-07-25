<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     */
    public function handleGoogleCallback( Request $request)
    {
        try {
            
            $user = Socialite::driver('google')->user();

            // Check both User and Member tables
            $authenticatedUser = User::where('email', $user->getEmail())->first();

            if ($authenticatedUser) {
                // Optionally update their google_id if it's null
                if (is_null($authenticatedUser->google_id)) {
                    $authenticatedUser->update(['google_id' => $user->getId()]);
                }

                // Log in the user
                Auth::login($authenticatedUser, true);
                return redirect()->route('das');
            } else {
                return redirect(session('old_url'))->with('error', 'No account found with this email.');
            }
        } catch (\Exception $e) {
            return redirect()->route('auth.members.login.get')->with('message', 'Failed to authenticate using Google.');
        }
    }
    
    
    /**
     * handGoogleApiAuth
     *
     * @param  Request $request
     * @return void
     */
    private function handGoogleApiAuth(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:members,email',
            'id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Validation failed',
                'message' => 'Validation failed, please try again with valid credentials'
            ], Response::HTTP_BAD_REQUEST);
        }

        try {

            return response()->json([
                'error' => 'User not recognized',
                'message' => 'User is not found on this server, please try again with valid credentials'
            ], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Failed to authenticate using Google.'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    

}
