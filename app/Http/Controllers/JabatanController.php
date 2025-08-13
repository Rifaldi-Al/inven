<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Bidang;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatans = Jabatan::all();
        return view('jabatan.index', compact('jabatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bidangs = Bidang::all();
        return view('jabatan.create',  compact('bidangs'));
    }

    public function edit($id)
    {
        $jabatan  = Jabatan::find($id);
        $bidang = Bidang::all();
        return view('jabatan.edit', compact('jabatan', 'bidang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $file = $request->file('kop_file');
        $originalExtension = $file->getClientOriginalExtension();
        $uniqueId = strtoupper(Str::random(3)); // Generate a random unique ID
        $uniqueFileName = $request->nama. '_kop_' . $uniqueId . '.' . $originalExtension;
        $path = $file->storeAs('public/kop_file', $uniqueFileName);
        
        $request->kop_file = $uniqueFileName;

        Jabatan::create([
            'kode_jabatan' => $request->kode_jabatan,
            'nama' => $request->nama,
            'kop_file' => $request->kop_file,
            'bidang_id' => $request->bidang_id,
        ]);

        return redirect()->route('jabatan.index')->with('success', 'Jabatan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('jabatan.edit', compact('jabatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $jabatan->fill($request->except('kop_file'));

        if ($request->has('kop_file')) {
            // Delete the previous file
            $filePath = storage_path('app/public/kop_file/' . $jabatan->kop_file);
            if (file_exists($filePath)) {
                unlink($filePath); 
            }

            $file = $request->file('kop_file');
            $originalExtension = $file->getClientOriginalExtension();
            $uniqueId = strtoupper(Str::random(3)); // Generate a random unique ID
            $uniqueFileName = $request->nama. '_kop_' . $uniqueId . '.' . $originalExtension;
            $path = $file->storeAs('public/kop_file/', $uniqueFileName);

            // Update the image_path attribute in the database
            $jabatan->kop_file = $uniqueFileName;
        }

        $jabatan->save();

        return redirect()->route('jabatan.index')->with('success', 'Bidang updated successfully.');
    }
    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();

        // Construct the full file path
        $filePath = storage_path('app/public/kop_file/' . $jabatan->kop_file);

        // dd($filePath);

        // Delete the associated file from storage
        if (file_exists($filePath)) {
            unlink($filePath); // Delete the file from the server
        }

        return redirect()->route('jabatan.index')->with('success', 'Jabatan deleted successfully.');
    }
}
