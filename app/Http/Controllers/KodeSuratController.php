<?php

namespace App\Http\Controllers;

use App\Models\Hal;
use App\Models\Bidang;
use App\Models\KodeSurat;
use App\Models\JenisSurat;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class KodeSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function create()
    {
        $currentYear = Carbon::now()->year;
        $hals = Hal::all();
        // $jenis_surats = JenisSurat::all();
        $nomor_surat = KodeSurat::where(DB::raw('YEAR(created_at)'), $currentYear)->count()+1;
        $nomor_surat_formatted = str_pad($nomor_surat, 3, "0", STR_PAD_LEFT);
        return view('kode_surat.create', compact('hals' ,'nomor_surat_formatted'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_surat' => 'required|string|max:255',
            // 'jenis_surat' => 'required|string|max:255',
            'hal_id' => 'required|string|max:255',
        ]);

        $kodeSurat = new KodeSurat();
        $kodeSurat->kode_surat = $request->kode_surat;
        // $kodeSurat->jenis_surat_id = $request->jenis_surat;
        $kodeSurat->hal_id = $request->hal_id;
        $kodeSurat->save();
    
        return redirect()->route('surat_keluar.index')->with('success', 'Kode Surat created successfully.');
    
    }

    public function edit(KodeSurat $kode_surat)
    {
        $hals = Hal::all();
        // $jenis_surats = JenisSurat::all();
        $nomor_surat = KodeSurat::count();
        $nomor_surat_formatted = str_pad($nomor_surat, 3, "0", STR_PAD_LEFT);

        return view('kode_surat.edit', compact('kode_surat','hals' ,'nomor_surat_formatted'));
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
