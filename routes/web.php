<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DaftarKegiatanController;
use App\Models\Komentar;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');
// Route::get('/tentang', [HomeController::class, 'tentang'])->name('tentang');
// Route::get('/tentang_team', [HomeController::class, 'tentang_team'])->name('tentang_team');
// Route::get('/beritas', [HomeController::class, 'beritas'])->name('beritas');
// Route::get('/read/{slug}', [HomeController::class, 'read'])->name('read');
// Route::get('/project/detail-project/{slug}', [HomeController::class, 'detailproject']);
// Route::get('/lihat-kegiatan/{slug}', [HomeController::class, 'lihatkegiatan'])->name('lihat-kegiatan');
// Route::get('/support', [HomeController::class, 'support']);
// Route::get('/lihat-partner', [HomeController::class, 'lihatpartner']);
// Route::get('/projects', [HomeController::class, 'lihatproject']);
// Route::get('/layanans', [HomeController::class, 'layanan']);
// Route::get('/kegiatanx', [HomeController::class, 'kegiatanx']);
// Route::get('/jadwalx', [HomeController::class, 'jadwalx']);
// Route::get('/baca/{slug}', [HomeController::class, 'baca'])->name('baca');
Route::get('/kegiatan/detail-kegiatan/{slug}', [HomeController::class, 'detailkegiatan']);
Route::resource('reservasi', ReservasiController::class);
Route::resource('komentar', KomentarController::class);
Route::resource('home', HomeController::class);
// Route::get('order', [OrderController::class, 'order'])->name('order');
// Route::get('order', [OrderController::class, 'order']);
Route::get('pesan/{id}', [HomeController::class, 'pesan']);
Route::post('simpan', [HomeController::class, 'simpan'])->name('simpan');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard.index');
    Route::resource('galeri', GaleriController::class);
    Route::post('image-upload', [GaleriController::class, 'storeImage'])->name('image.upload');
    Route::resource('setting', SettingController::class);
    // Route::resource('team', TeamController::class);
    // Route::resource('berita', BeritaController::class);
    // Route::resource('partner', PartnerController::class);
    // Route::resource('project', ProjectController::class);
    // Route::resource('rekening', RekeningController::class);
    Route::resource('kegiatan', KegiatanController::class);
    // Route::resource('client', ClientController::class);
    // Route::resource('visi', VisiController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('about', AboutController::class);
    Route::resource('daftar_kegiatan', DaftarKegiatanController::class);
    Route::resource('layanan', LayananController::class);
    Route::resource('team', TeamController::class);

});
