<?php

namespace App\Http\Controllers\Dashboard\Users;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->latest()->paginate(10);
        return view('dashboard.users.index', ['users' => $users]);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'phone'    => 'nullable|string|max:20',
            'password' => 'required|confirmed|min:6',
        ]);

        try {
            DB::beginTransaction();

            User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'phone'    => $request->phone,
                'password' => trim($request->password),
                'type' => User::USER_TYPE_ADMIN,
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'User created successfully.');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create user.');
        }
    }

    /**
     * show
     *
     * @param  User $user
     * @return void
     */
    public function show(User $user)
    {
        return view('', compact('user'));
    }

    /**
     * edit
     *
     * @param  User $user
     * @return void
     */
    public function edit(User $user)
    {
        return view('', compact('user'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  User $user
     * @return void
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'phone'    => 'nullable|string|max:20',
            'password' => 'nullable|confirmed|min:6',
        ]);

        try {
            DB::beginTransaction();

            $user->update([
                'name'     => $request->name,
                'email'    => $request->email,
                'phone'    => $request->phone,
            ]);

            if ($request->filled('password')) {
                $user->update(['password' => trim($request->password)]);
            }

            DB::commit();
            return redirect()->route('dashboard.users.index')->with('success', 'User updated successfully.');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update user.');
        }
    }

    /**
     * destroy
     *
     * @param  User $user
     * @return void
     */
    public function destroy(User $user)
    {
        try {
            DB::beginTransaction();

            $user->delete();

            DB::commit();
            return redirect()->back()->with('success', 'User deleted successfully.');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to delete user.');
        }
    }
}
