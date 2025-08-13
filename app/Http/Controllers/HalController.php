<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hal;

class HalController extends Controller
{
    public function index()
    {
        $Hals = Hal::withTrashed()->get();

        return view('hal.index', compact('Hals'));
    }

    public function create()
    {
        return view('hal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode_hal' => 'required|string|max:255',
        ]);

        hal::create($request->all());

        return redirect()->route('hal.index')->with('success', 'Hal created successfully.');
    }

    public function edit(Hal $hal)
    {
        return view('hal.edit', compact('hal'));
    }

    public function update(Request $request, Hal $hal)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode_hal' => 'required|string|max:255',
        ]);

        $hal->update($request->all());

        return redirect()->route('hal.index')->with('success', 'Hal updated successfully.');
    }

    public function destroy(Hal $hal)
    {
        $hal->delete();

        return redirect()->route('hal.index')->with('success', 'Hal deleted successfully.');
    }
}
