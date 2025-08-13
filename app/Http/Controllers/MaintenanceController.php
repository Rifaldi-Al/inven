<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenance;

class MaintenanceController extends Controller
{
    public function index(){
        $datas = Maintenance::all();
        return view('maintenance.index', compact('datas'));
    }

    public function create(){
        return view('maintenance.create');
    }
    public function store(Request $request){
        dd($request->all());

        return view('maintenance.index');
    }
}
