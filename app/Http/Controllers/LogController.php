<?php

namespace App\Http\Controllers;

use App\Models\Inventori;
use App\Models\Log;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter'); // Get the selected filter from the query parameter

        if ($filter) {
            // Filter the Pegawai data based on the selected Area Kerja
            $logs = Log::whereHas('inventori', function ($query) use ($filter) {
                $query->where('nomor_seri', $filter); // Filter where Pegawai name matches the filter
            })->paginate(10);
        } else {
            // If no filter is selected, fetch all Pegawai data
            $logs = Log::all();
        }
        $pegawais=Pegawai::all();
        $inventoris=Inventori::all();

        return view('log_radio.index', compact('logs', 'pegawais', 'inventoris', 'filter'));
    }
    public function create(Request $request)
    {
        $selectedInventori = $request->query('inventori');
        $pegawais=Pegawai::all();
        $inventoris=Inventori::all();

        return view('log_radio.create', compact('selectedInventori', 'pegawais', 'inventoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'perangkat_lama' => 'required|string|max:255',
            'perangkat_baru' => 'required|string|max:255',
            'keterangan' => 'string|max:255',
            'id_pegawai' => 'required|string|max:255',
            'catatan' => 'string',
            'id_inventori_radio' => 'required|exists:inventori_radio,id',
        ]);

        $log = Log::create($request->all());

        return redirect()->route('log.index', ['filter' => $log->inventori->nomor_seri])->with('success', 'Log Created Successfully.');
    }

    public function edit(Request $request, Log $log)
    {   
        $selectedInventori = $request->query('inventori');
        $pegawais=Pegawai::all();
        $inventoris=Inventori::all();
        
        return view('log_radio.edit', compact('log', 'selectedInventori', 'pegawais', 'inventoris'));
    }

    public function update(Request $request, Log $log)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'perangkat_lama' => 'required|string|max:255',
            'perangkat_baru' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'id_pegawai' => 'required|string|max:255',
            'catatan' => 'required|string|max:255',
            'id_inventori_radio' => 'required|exists:inventori_radio,id',
        ]);

        $log->update($request->all());

        return redirect('/log')->with('success', 'Log Updated Successfully.');
    }

    public function destroy(Log $log)
    {
        $log->delete();

        return redirect('/log')->with('success', 'Log Deleted Successfully.');
    }
}
