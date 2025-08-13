<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(){
        $this->middleware('role:superadmin');
    }

    public function index()
    {
        $roles = Roles::withTrashed()->get();

        return view('role.index', compact('roles'));
    }
    public function create()
    {
        return view('role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Roles::create($request->all());

        return redirect()->route('role.index')->with('success', 'Role berhasil dibuat');
    }

    public function edit(Bidang $bidang)
    {
        return view('bidang.edit', compact('bidang'));
    }

    public function update(Request $request, Bidang $bidang)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $bidang->update($request->all());

        return redirect()->route('bidang.index')->with('success', 'Bidang updated successfully.');
    }

    public function destroy(Bidang $bidang)
    {
        $bidang->delete();

        return redirect()->route('bidang.index')->with('success', 'Bidang deleted successfully.');
    }
}
