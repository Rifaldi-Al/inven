<?php

namespace App\Http\Controllers;

use App\Models\DetailAset;
use Illuminate\Http\Request;

class DetailAsetController extends Controller
{
    public function index()
    {
        $detail_asets = DetailAset::all();

        return view('detail_aset.index', compact('detail_asets'));
    }
   
    public function create()
    {
        return view('detail_aset.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_aset' => 'required|string|max:255',
            'nomor_seri' => 'required|string|max:255',
            'merk' => 'required|string|max:255',
            'spesifikasi' => 'required|string|max:255',
        ]);

        DetailAset::create($request->all());

        return redirect('/detail_aset')->with('success', 'Detail Aset created successfully.');
    }

    public function edit(DetailAset $detail_aset)
    {
        return view('detail_aset.edit', compact('detail_aset'));
    }

    public function update(Request $request, DetailAset $detail_aset)
    {
        $request->validate([
            'nama_aset' => 'required|string|max:255',
            'nomor_seri' => 'required|string|max:255',
            'merk' => 'required|string|max:255',
            'spesifikasi' => 'required|string|max:255',
        ]);

        $detail_aset->update($request->all());

        return redirect('/detail_aset')->with('success', 'Detail Aset updated successfully.');
    }

    public function destroy(DetailAset $detail_aset)
    {
        $detail_aset->delete();

        return redirect('/detail_aset')->with('success', 'Detail_Aset deleted successfully.');
    }
}
