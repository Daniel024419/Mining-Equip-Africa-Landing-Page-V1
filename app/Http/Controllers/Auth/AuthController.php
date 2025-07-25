<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
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
        if (Auth::guard('web')->check()) {
            return redirect()->route(Auth::guard('web')->user()->user->role->name . '.dashboard.index')->with('login_success', true);
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
                return redirect()->route('dashboard.admin.index');
            }
        } catch (\Exception $e) {
            logger()->error($e);
            return back()->withErrors([
                'error' => 'Authentication cant be processed now, Please try again later',
            ])->onlyInput('identifier');
        }
        logger()->error('request ' . $request);
        return back()->withErrors([
            'identifier' => 'The provided credentials do not match our records.',
        ])->onlyInput('identifier');
    }


    /**
     * logout
     *
     * @param  Request $request
     * @return void
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerateToken();

        return redirect()->route('dashboard.auth.index');
    }
}
