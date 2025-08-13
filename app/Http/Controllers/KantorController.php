<?php

namespace App\Http\Controllers;

use App\Models\Kantor;
use Illuminate\Http\Request;

class KantorController extends Controller
{
    public function index(Request $request)
    {
    // Check for the 'filter' query parameter
    $filter = $request->query('filter');

    if ($filter) {
        // Filter the data based on the 'filter' value
        $kantors = Kantor::where('nama', $filter)->paginate(10);
    } else {
        // Fetch all data if no filter is provided
        $kantors = Kantor::paginate(12);
    }

        return view('kantor.index', compact('kantors'));
    }
    public function create()
    {
        return view('kantor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Kantor::create($request->all());

        return redirect('/kantor')->with('success', 'Pegawai Created Successfully.');
    }

    public function edit(Kantor $kantor)
    {    
        return view('kantor.edit', compact('kantor'));
    }


    public function update(Request $request, Kantor $kantor)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kantor->update($request->all());

        return redirect('/kantor')->with('success', 'kantor Updated Successfully.');
    }

    public function destroy(Kantor $kantor)
    {
        $kantor->delete();

        return redirect('/kantor')->with('success', 'kantor Deleted Successfully.');
    }
}
