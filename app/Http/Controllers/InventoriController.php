<?php

namespace App\Http\Controllers;

use App\Models\Inventori;
use App\Models\Kantor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InventoriController extends Controller
{
    public function index()
    {
        $inventoris = Inventori::all();
        // dd($inventoris[1]->kantor);

        $year = Carbon::now()->format('Y');
        return view('inventori_radio.index', compact('inventoris', 'year'));
    }

    public function create()
    {
        $kantor = Kantor::all();
        return view('inventori_radio.create', compact('kantor'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_seri' => 'required|string|max:255',
            'tanggal_pemasangan' => 'required|date',
            'waktu_pemakaian' => 'required|string|max:255',
            'id_kantor' => 'required|string|max:255',
        ]);

        $tanggal_pemasangan = Carbon::parse($request->tanggal_pemasangan);
        $currentDate = Carbon::now();
        $ageInMonths = $tanggal_pemasangan->diffInMonths($currentDate);

        $keterangan = $ageInMonths < 60 ? 'Aktif' : 'Perlu Diganti';

        Inventori::create([
            'nomor_seri' => $request->nomor_seri,
            'tanggal_pemasangan' => $request->tanggal_pemasangan,
            'waktu_pemakaian' => $request->waktu_pemakaian,
            'id_kantor' => $request->id_kantor,
            'keterangan' => $keterangan,
        ]);

        return redirect('/inventori')->with('success', 'Inventori Created Successfully.');
    }

    public function edit(Inventori $inventori)
    {
        return view('inventori_radio.edit', compact('inventori'));
    }

    public function update(Request $request, Inventori $inventori)
    {
        $request->validate([
            'nomor_seri' => 'required|string|max:255',
            'tanggal_pemasangan' => 'required|date',
            'waktu_pemakaian' => 'required|string|max:255',
        ]);

        $inventori->update($request->all());

        return redirect('/inventori')->with('success', 'Inventori Updated Successfully.');
    }

    public function destroy(Inventori $inventori)
    {
        $inventori->delete();

        return redirect('/inventori')->with('success', 'Inventori Deleted Successfully.');
    }
}
