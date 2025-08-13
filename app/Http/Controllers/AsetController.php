<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\DetailAset;
use App\Models\Kategori;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter');

        if ($filter) {
            $asets = DetailAset::whereHas('Pegawai', function ($query) use ($filter) {
                $query->where('nama', $filter);
            })->paginate(10);
        } else {
            $asets = DetailAset::all();
        }
        // dd($asets);
        $pegawais = Pegawai::all();
        // $asets = DetailAset::all();
        // dd($asets[0]->aset->kategori->nama);

        return view('aset.index', compact('asets'));
    }
    public function create()
    {
        $pegawais = Pegawai::all();
        $kategoris = Kategori::where('kategori_alat', 'Hardware')->get();

        return view('aset.create', compact('pegawais', 'kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'merk' => 'required|string|max:255',
            'tanggal_pembelian' => 'required|date',
            'spesifikasi' => 'required|string',
            'jumlah' => 'required|integer|min:1',
            'kategori' => 'required',
            'status' => 'required|in:Digunakan,Di Gudang,Rusak',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Get the category code
        $kategori = Kategori::findOrFail($request->kategori);
        $kode = $kategori->kode; // Get just the code string

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('public/aset_images');
            $imagePath = str_replace('public/', 'storage/', $path);
        }

        // Create main asset
        $aset = Aset::create([
            'nama' => $validated['nama'],
            'merk' => $validated['merk'],
            'spesifikasi' => $validated['spesifikasi'],
            'id_kategori' => $validated['kategori'],
            'status' => $validated['status'],
            'jumlah' => $validated['jumlah'],
            'gambar' => $imagePath,
        ]);

        // Create detail assets
        $detailAssets = [];
        $currentYear = date('Y');

        for ($x = 1; $x <= $validated['jumlah']; $x++) {
            $detailAssets[] = [
                'id_aset' => $aset->id,
                'nomor_seri' => $kode . $currentYear . str_pad($x, 4, '0', STR_PAD_LEFT),
                'tanggal_beli' => $validated['tanggal_pembelian'],
                'status' => 'Di Gudang', // Default status for new items
                'image' => $imagePath,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Bulk insert for better performance
        DetailAset::insert($detailAssets);

        return redirect()->route('aset.index')
                    ->with('success', 'Aset berhasil ditambahkan');
    }

    public function edit(Aset $aset)
    {
        $pegawais=Pegawai::all();

        return view('aset.edit', compact('aset', 'pegawais'));
    }

    public function inventaris(DetailAset $aset)
    {
        $pegawais = Pegawai::all();

        return view('aset.inventaris', compact('aset', 'pegawais'));
    }

    public function update(Request $request, DetailAset $aset)
    {
        // dd($aset);
        $request->validate([
            'id_pegawai' => 'required|string|max:255',
        ]);

        $aset->update($request->all());

        return redirect('/aset')->with('success', 'Aset Updated Successfully.');
    }

    public function destroy(Aset $aset)
    {
        $aset->delete();

        return redirect('/aset')->with('success', 'Aset Deleted Successfully.');
    }
}
