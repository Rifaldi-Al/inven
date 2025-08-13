<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;

class BidangController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $bidangs = Bidang::withTrashed()->get();

        return view('bidang.index', compact('bidangs'));
    }
    public function create()
    {
        return view('bidang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Bidang::create($request->all());

        return redirect()->route('bidang.index')->with('success', 'Bidang created successfully.');
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
