<?php

namespace App\Http\Controllers;

use App\Models\Kantor;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        // $filter = $request->query('filter'); // Get the selected filter from the query parameter

        // if ($filter) {
        //     // Filter the Pegawai data based on the selected Area Kerja
        //     $pegawais = Pegawai::whereHas('Kantor', function ($query) use ($filter) {
        //         $query->where('nama', $filter); // Filter where Kantor name matches the filter
        //     })->paginate(10);
        // } else {
        //     // If no filter is selected, fetch all Pegawai data
        //     $pegawais = Pegawai::all();
        // }
        $kantors = Kantor::all();
        $pegawais = Pegawai::all();
        // dd($pegawais);

        return view('pegawai.index', compact('pegawais', 'kantors'));
    }
    public function create(Request $request)
    {
        $selectedKantor = $request->query('kantor');
        $kantors = Kantor::all();

        return view('pegawai.create', compact('selectedKantor', 'kantors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|max:12',
            'nama' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'departemen' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'id_kantor' => 'required|string|max:255',
            'umh' => 'required|string|max:255',
        ]);

        $pegawai = Pegawai::create($request->all());
        $kantorNama = $pegawai->Kantor->nama;

        return redirect()->route('pegawai.index', ['filter' => $kantorNama])->with('success', 'Pegawai Created Successfully.');
    }

    public function edit(Pegawai $pegawai, Request $request)
    {
        $selectedKantor = $request->query('kantor');
        $kantors = Kantor::all();

        return view('pegawai.edit', compact('pegawai', 'selectedKantor', 'kantors'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        // dd($pegawai);
        $request->validate([
            'nik' => 'required|string|max:12',
            'nama' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'departemen' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'id_kantor' => 'required|string|max:255',
            'umh' => 'required|string|max:255',
        ]);

        $pegawai->update($request->all());
        $kantorNama = $pegawai->Kantor->nama;

        return redirect()->route('pegawai.index', ['filter' => $kantorNama])->with('success', 'Pegawai Updated Successfully.');
    }

    public function destroy(Request $request, Pegawai $pegawai)
    {
        $pegawai->delete();
        $kantorNama = $pegawai->Kantor->nama;

        return redirect()->route('pegawai.index', ['filter' => $kantorNama])->with('success', 'Pegawai Deleted Successfully.');
    }
}
