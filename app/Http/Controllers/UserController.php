<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }
    public function create()
    {
        $roles = Roles::all();
        $jabatans = Jabatan::all();
        return view('user.create', compact('roles', 'jabatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'nip' => 'required|integer',
            'kontak' => 'required|integer',
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        $admin = User::create($request->all());

        $admin->assignRole($request->role);

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'nip' => 'required|integer',
            'kontak' => 'required|integer',
            'email' => 'required|string|max:255',
        ]);

        $user->update($request->all());

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', 'user deleted successfully.');
    }
}
