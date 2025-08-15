<?php
// app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use App\Models\Kantor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $kantor = Kantor::count();

        return view('dashboard', compact('kantors', 'totals'));
    }
}
