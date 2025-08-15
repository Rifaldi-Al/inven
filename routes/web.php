<?php

use App\Http\Controllers\AsetController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\DetailAsetController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JenisBidangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\TemplateSuratController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\KodeSuratController;
use App\Http\Controllers\JenisSuratCozntroller;
use App\Http\Controllers\HalController;
use App\Http\Controllers\InventoriController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\KantorController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\PegawaiController;
use App\Models\DetailAset;
use App\Models\Disposisi;
use App\Models\Inventori;
use App\Models\Kantor;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Models\SuratMasuk;
use App\Models\SuratKeluar;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if(auth()->check()){
        $kantor_count = Kantor::count();
        $inventori_count = Inventori::count();

        return view('dashboard', compact('kantor_count', 'inventori_count'));
    }else{
        return redirect()->route('login');
    }
});

Route::get('/dashboard', function () {
    $kantor_count = Kantor::count();
    $inventori_count = Inventori::count();

    return view('dashboard', compact('kantor_count', 'inventori_count'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('bidang',BidangController::class);
    Route::resource('surat_masuk',SuratMasukController::class);
    Route::resource('jabatan',JabatanController::class);
    Route::resource('aset', AsetController::class, ['names' => 'aset']);
    Route::get('aset/{aset}/inventaris', [AsetController::class, 'inventaris'])->name('aset.inventaris');
    Route::resource('kategori',KategoriController::class);
    Route::resource('pegawai',PegawaiController::class);
    Route::resource('inventori',InventoriController::class);
    Route::resource('inventaris',InventarisController::class);
    Route::resource('maintenance',MaintenanceController::class);
    Route::resource('log', LogController::class);
    Route::resource('kantor', KantorController::class);
    Route::resource('detail_aset', DetailAsetController::class);
    Route::resource('laporan', LaporanController::class);

    // Route::resource('bidang',BidangController::class);

    Route::resource('jenisbidang',JenisBidangController::class);
    Route::resource('jenisbidang',JenisBidangController::class);
    Route::resource('surat_masuk',SuratMasukController::class);
    Route::resource('template_surat',TemplateSuratController::class);
    Route::resource('user',UserController::class);
    Route::get('/surat-keluar/create/{id}', [SuratKeluarController::class, 'create'])->name('surat_keluar.buat');
    Route::resource('surat_keluar', SuratKeluarController::class, ['names' => 'surat_keluar']);
    Route::resource('kode_surat', KodeSuratController::class);
    Route::resource('kode_surat', KodeSuratController::class);
    Route::get('/disposisi/create/{id}', [DisposisiController::class, 'buat'])->name('disposisi.buat');
    Route::resource('disposisi', DisposisiController::class);

    Route::resource('hal', HalController::class);

    Route::get('download-surat/{fileName}', [SuratKeluarController::class, 'downloadSurat'])->name('surat_keluar.download');
    Route::get('/surat_masuk/download/{fileName}', [SuratMasukController::class, 'downloadSurat'])->name('surat_masuk.download');

    Route::post('/surat_keluar_users/perbarui_status', [SuratKeluarController::class, 'perbarui_status'])->name('surat_keluar_users.perbarui_status');


});

require __DIR__.'/auth.php';

