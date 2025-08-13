<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::all();

        return view('laporan.index', compact('laporans'));
    }

    public function create()
    {
        return view('laporan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_aset' => 'required|string|max:255',
            'nomor_seri' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'pegawai' => 'required|string|max:255',
            'masuk' => 'required|string|max:255',
            'keluar' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'waktu_pengerjaan' => 'required|string|max:255',
        ]);

        Laporan::create($request->all());

        return redirect('/laporan')->with('success', 'Laporan Aset created successfully.');
    }

    public function edit(Laporan $laporans)
    {
        return view('laporan.edit', compact('laporans'));
    }

    public function update(Request $request, Laporan $laporans)
    {
        $request->validate([
            'nama_aset' => 'required|string|max:255',
            'nomor_seri' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'pegawai' => 'required|string|max:255',
            'masuk' => 'required|string|max:255',
            'keluar' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'waktu_pengerjaan' => 'required|string|max:255',
        ]);

        $laporans->update($request->all());

        return redirect('/laporan')->with('success', 'Laporan Aset updated successfully.');
    }

    public function destroy(Laporan $laporans)
    {
        $laporans->delete();

        return redirect('/laporan')->with('success', 'Laporan Aset deleted successfully.');
    }
}
