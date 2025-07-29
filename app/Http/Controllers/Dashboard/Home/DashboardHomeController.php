<?php

namespace App\Http\Controllers\Dashboard\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardHomeController extends Controller
{

    /**
     * updateProfile
     *
     * @param  mixed $request
     * @return void
     */
    public function updateProfile(Request $request)
    {   
        /** @var User $user */
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
        ]);

        $user->update($validated);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    /**
     * settings
     *
     * @return void
     */
    public function settings()
    {
        return view('dashboard.home.settings');
    }
}
