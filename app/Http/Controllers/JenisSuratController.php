<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\Request;

class JenisSuratController extends Controller
{
    public function index(){

        $data = JenisSurat::all();
        return view('jenis_surat.index',compact('data'));
    }

    public function create(){
        return view('jenis_surat.create');
    }

    public function store(request $request){
        //dd($request->all());
        JenisSurat::create($request->all());
        return redirect ()->route('jenis_surat.index')->with('success','Data Berhasil Di Tambahkan');
    }

    public function edit($id)
    {
        $data = JenisSurat::where('id',$id)->first();
        return view('jenis_surat.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $data = JenisSurat::where('id', $id)->first();
        
        $data->update($request->all());

        return redirect()->route('jenis_surat.index')->with('success', 'Data updated successfully.');
    }

    public function destroy($id)
{
    $jenis_surat = JenisSurat::findOrFail($id);
    $jenis_surat->delete();

    return redirect()->route('jenis_surat.index')
                     ->with('success', 'Data berhasil dihapus.');
}

    public function restore($id)
    {
        // Menemukan data yang telah dihapus
        $jenis_surat = JenisSurat::withTrashed()->findOrFail($id);

        // Lakukan pengembalian data
        $jenis_surat->deleted_at = null;
        $jenis_surat->update();

        return redirect()->route('jenis_surat.index')
                         ->with('success', 'Data berhasil dipulihkan.');
    }
}
