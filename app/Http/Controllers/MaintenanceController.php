<?php

namespace App\Http\Controllers;

use App\Models\DetailAset;
use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\Laporan;

class MaintenanceController extends Controller
{
    public function index(){
        if(auth()->user()->role == "admin") {
            $datas = Maintenance::all();
        } else {
            $datas = Maintenance::where('id_pegawai', auth()->user()->id)->get();
        }
        // dd($datas);
        return view('maintenance.index', compact('datas'));
    }

    public function create(){
        $aset = DetailAset::where('id_pegawai', auth()->user()->id_pegawai)->get();
        // dd($aset);
        return view('maintenance.create', compact('aset'));
    }
    public function store(Request $request){
        // dd($request->all());

        $request->validate([
            'id_detail' => 'required',
            'tanggal_perbaikan' => 'required',
            'keterangan' => 'required|string',
        ]);

        Maintenance::create([
            'id_detail' => $request->id_detail,
            'tanggal_perbaikan' => $request->tanggal_perbaikan,
            'tanggal_laporan' => \Carbon\Carbon::now()->format('Y-m-d'),
            'keterangan' => $request->keterangan,
            'status' => 'Menunggu',
            'id_pegawai' => auth()->user()->id,
        ]);
        return view('maintenance.index');
    }

    public function edit(Maintenance $maintenance, Request $request)
    {

        // dd($maintenance->tanggal_perbaikan);
        return view('maintenance.edit', compact('maintenance'));
    }

    public function update(Request $request, Maintenance $maintenance)
    {
        // dd($maintenance);
        $maintenance->update([
            'status' => $request->status,
            'keterangan' => $request->keterangan
        ]);

        Laporan::create([
            'id_detail' => $maintenance->id_detail,
            'id_pegawai' => $maintenance->id_pegawai,
            'masuk' => $maintenance->tanggal_perbaikan,
            'keluar' => $request->keluar,
            'keterangan' => $request->keterangan,
            'waktu_pengerjaan' => $request->waktu_pengerjaan,
        ]);

        return redirect()->route('laporan.index')->with('success', 'Data Maintenance Berhasil Terubah dan Menambah Data Laporan.');
    }
}
