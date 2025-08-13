<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\Request;
use App\Models\TemplateSurat;
use App\Models\Bidang;

class TemplateSuratController extends Controller
{
    public function index()
    {
        $template_surats = TemplateSurat::all();
        return view('template_surat.index', compact('template_surats'));
    } 

    public function create()
    {
        $jenissurats = JenisSurat::all();
        $bidangs = Bidang::all();
        return view('template_surat.create', compact('bidangs', 'jenissurats'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'nama' => 'required|string',
            'jenis_surat_id' => 'required|string',
            'created_by' => 'required|string',
            'bidang_id' => 'required|string',
            'deskripsi' => 'required|string',
            'nama_file' => 'required|string',
        ]);

        TemplateSurat::create($request->all());

        return redirect()->route('template_surat.index')->with('success', 'Tersimpan.');
    }
}