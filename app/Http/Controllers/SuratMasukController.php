<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Disposisi;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use App\Models\User;
use App\Models\UsersJabatan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;


class SuratMasukController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Get the authenticated user
        $userJabatan = UsersJabatan::where('users_id', $user->id)->pluck('jabatan_id')->toArray(); // Corrected this line
        
         // Check if the user has the superadmin role
         if ($user->hasRole('superadmin')) {
            // Fetch all suratmasuk for superadmin
            $suratmasuks = SuratMasuk::with('userJabatan', 'user')->get();
        } else {
            // Get the user's jabatans
            $userJabatan = UsersJabatan::where('users_id', $user->id)->pluck('jabatan_id')->toArray();

            // Fetch suratmasuks for the user's jabatan
            $suratmasuks = SuratMasuk::with('userJabatan', 'user')
                ->whereHas('userJabatan', function ($q) use ($userJabatan) {
                    $q->whereIn('jabatan_id', $userJabatan);
                })->get();
        }
        $usersjabatans = UsersJabatan::all();
        $users = User::all();

        // Get surat_masuk_ids where users_jabatan matches the user's jabatan
        $suratMasukIds = SuratMasuk::whereIn('users_jabatan', $userJabatan)->pluck('id')->toArray();

        // Filter dispositions based on surat_masuk_ids
        
        return view('surat_masuk.index', compact('suratmasuks', 'usersjabatans', 'users', 'user'));
    }

    public function create()
    {
        $usersjabatans = UsersJabatan::all();                 
        $users = User::all();
        $jabatans = Jabatan::all(); // Fetch all jabatans

        return view('surat_masuk.create', compact('users', 'usersjabatans', 'jabatans'));
    }

    public function store(Request $request)
    {   
        // $jabatan = Jabatan::select('id')->where('')
        $request->validate([
            'perihal' => 'required|string',
            'file_surat' => 'required|mimes:pdf',
            'tanggal' => 'required|date',
            'pengirim' => 'required|string',
            'status' => 'required|in:approve,disposisi',
            // 'created_by' => 'required|string',
            'users_jabatan' => 'required|integer',
        ]);

        // dd($request->tanggal);

        $file = $request->file('file_surat');
        $originalExtension = $file->getClientOriginalExtension();
        $originalFilename = $file->getClientOriginalName();
        // $uniqueId = strtoupper(Str::random(3)); // Generate a random unique ID
        // $uniqueFileName = 'SRTM-' . $uniqueId . '.' . $originalExtension;
        $uniqueFileName = "$originalFilename";
        $path = $file->storeAs('public/surat_masuk', $uniqueFileName);

        
        $suratMasuk = new SuratMasuk([
            'perihal' => $request->perihal,
            'file_surat' => $path,
            'tanggal' => $request->tanggal,
            // 'nomor_surat' => $request->nomor_surat,
            'pengirim' => Auth::user()->name,
            'status' => $request->status,
            // 'created_by' => $request->created_by,
            'users_jabatan' => $request->users_jabatan,
        ]);

        $suratMasuk->save();

        return redirect()->route('surat_masuk.index')->with('success', 'File Terupload.');
    }

    public function edit($id)
    {
        $suratmasuks = SuratMasuk::find($id);
        $usersjabatans = UsersJabatan::all();
        $bidangs = Bidang::all();
        $users = User::all();

        return view("surat_masuk.edit", compact('suratmasuks', 'usersjabatans', 'bidangs', 'users'));
    }

    public function update($id, Request $request)
{
    $suratMasuk = SuratMasuk::findOrFail($id); // Assuming SuratMasuk is your model class
    $suratMasuk->update($request->all());

    // If you want to validate the request, you can uncomment and use the validation code here.
        $request->validate([
        'perihal' => 'required|string',
        'file_surat' => 'required|mimes:pdf,jpg,png',
        'tanggal' => 'required|date',
        'pengirim' => 'required|string',
        'status' => 'required|in:approve,disposisi',
        'created_by' => 'required|string',
        'users_jabatan' => 'required|integer',
        ]);

    return redirect()->route('surat_masuk.index')->with('success', 'Surat Masuk updated successfully.');
    }

    public function show(SuratMasuk $suratMasuk)
    {
        $usersjabatans = UsersJabatan::all();
        $users = User::all();
        $jabatans = Jabatan::select('nama')->where('id', $suratMasuk->userJabatan->jabatan->id)->get();
        $disposisis = Disposisi::select('tanggal', 'alasan')->where('surat_masuk_id', $suratMasuk->id)->get();
        // $disposisi = $disposisis->isNotEmpty() ? $disposisis[0] : null; // Check if not empty
        // Assuming you want to pass the surat_keluar object to a view
        return view('surat_masuk.show', compact('suratMasuk', 'disposisis'));
    }

    public function destroy($id)
    {
        $suratmasuks = SuratMasuk::find($id);
        $suratmasuks->delete();

        return redirect()->route('surat_masuk.index')->with('success', 'Surat Masuk deleted successfully.');
    }

    public function downloadSurat($fileName)
    {
        $filePath = storage_path('app/public/surat_masuk/' . $fileName);
        
        return Response::download($filePath);
    }
}
