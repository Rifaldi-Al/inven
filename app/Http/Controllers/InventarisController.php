<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailAset;
use App\Models\User;

class InventarisController extends Controller
{
    public function index(){
        if(auth()->user()->role =="user"){
            $pegawai = User::where('id_pegawai', auth()->user()->id_pegawai)->first();

            // dd($pegawai);
            $inventaris = DetailAset::where('id_pegawai', $pegawai->id_pegawai)->get();
            // dd($inventaris);
        }else{
            $inventaris = DetailAset::whereNotNull('id_pegawai')->get();
        }

        return view('inventaris.index', compact('inventaris'));
    }
}
