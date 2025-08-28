<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();
        if (Auth::guard('web')->check()) {
            if ($user->isAdmin()) {
                return redirect()->route('dashboard.posts.index')->with('login_success', true);
            } else {
                return redirect()->route('frontend.home.blog');
            }
        }

        return view('auth.login');
    }

    /**
     * login
     *
     * @param  LoginRequest $request
     * @return void
     */
    public function login(LoginRequest $request)
    {

        $credentials = $request->validated();
        $remember = $credentials['remember_me'] ?? false;
        try {

            $column = filter_var($credentials['identifier'], FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
            if (Auth::guard('web')->attempt([$column => $credentials['identifier'], 'password' => $credentials['password']], $remember)) {
                $request->session()->regenerate();
                /** @var User $user */
                $user = Auth::user();
                if ($user->isAdmin()) {
                    return redirect()->route('dashboard.posts.index')->with('login_success', true);
                } else {
                    return redirect()->back();
                }
            }
        } catch (\Exception $e) {
            return back()->with(
                'error' , 'Authentication cant be processed now, Please try again later',
            )->onlyInput('identifier');
        }
        logger()->error('request ' . $request);
        return back()->with(
            'error',
            'The provided credentials do not match our records.',
        )->onlyInput('identifier');
    }


    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('dashboard.auth.index')->with('warning', 'You are not logged in.');
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($user->isAdmin()) {
            return redirect()->route('dashboard.auth.index');
        }

        return redirect()->back()->with('success', 'You have been logged out.');
    }
}
