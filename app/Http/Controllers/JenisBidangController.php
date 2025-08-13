<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\JenisBidang;
use Illuminate\Http\Request;


class JenisBidangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisbidangs = JenisBidang::withTrashed()->get();

        return view('jenisbidang.index', compact('jenisbidangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bidangs = Bidang::all();
        return view('jenisbidang.create', compact('bidangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'bidang_id' => 'required|exists:bidang,id',
        ]);
        JenisBidang::create($data);
        return redirect()->route('jenisbidang.index')->with('success', 'sukses tambah data');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jenisBidang  = JenisBidang::find($id);
        $bidang = Bidang::all();
        return view('jenisbidang.edit', compact('jenisBidang', 'bidang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $data = $request->validate([
        //     'nama' => 'required',
        //     'bidang_id' => 'required|exists:bidangs,id',
        // ]);
        JenisBidang::find($id)->update([
            'nama' => $request->nama,
            'bidang_id' => $request->bidang_id
        ]);
        return redirect()->route('jenisbidang.index')->with('success', 'sukses update data');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        JenisBidang::findOrFail($id)->delete();
        return redirect()->route('jenisbidang.index')->with('success', 'Data Terhapus');
    }
}
