<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\Jabatan;
use App\Models\UsersJabatan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DisposisiController extends Controller
{
    public function buat($id)
    {
        //dd($id);
        $test = Auth::id();
        $jabatan = UsersJabatan::select('jabatan_id')->where('users_id', $test)->get();
        $jabatans = Jabatan::all()->where('id', '>=', $jabatan[0]->jabatan_id);
        // dd($jabatans);
        return view('disposisi.create', compact('jabatans' , 'id'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'alasan' => 'required|string',
            'surat_masuk_id' => 'required|string',
            'users_jabatan_id' => 'required|string',
        ]);

        Disposisi::create([
            'tanggal' => Carbon::now()->format('Y-m-d'),
            'alasan' => $request['alasan'],
            'users_jabatan_id' => $request['uusers_jabatan_id'],
            'surat_masuk_id' => $request['surat_masuk_id'],
        ]);

        return redirect()->route('surat_masuk.index')->with('success', 'Disposisi Terbuat');
    }
}