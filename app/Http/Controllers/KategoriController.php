<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;


class KategoriController extends Controller
{
    public function index(){

        $asets = Kategori::all();
        return view('kategori.index', compact('asets'));
    }

    public function create(){
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:255',
            'kategori_alat' => 'required|string|max:255',
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori created successfully.');
    }
}
