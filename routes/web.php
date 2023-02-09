<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    UserController,
    KategoriController,
    SupplierController,
    TokoController,
    ProdukController,
    DashboardController,
    BarangMasukController,
    BarangKeluarController,
    LaporanController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::redirect('/', '/dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard.index');

Route::prefix('dashboard')->middleware('auth')->group(function () {
    // Route::get('/index', [])->name('dashboard.index');

    //User
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('dashboard.user.delete');
    Route::get('/user', [UserController::class, 'index'])->name('dashboard.user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('dashboard.user.create');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('dashboard.user.edit');
    Route::post('/user/store', [UserController::class, 'store'])->name('dashboard.user.store');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('dashboard.user.update');


    //Kategori
    Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('dashboard.kategori.delete');
    Route::get('/kategori', [KategoriController::class, 'index'])->name('dashboard.kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('dashboard.kategori.create');
    Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('dashboard.kategori.edit');
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('dashboard.kategori.store');
    Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('dashboard.kategori.update');

    //Supplier 
    Route::delete('/supplier/{supplier}', [SupplierController::class, 'destroy'])->name('dashboard.supplier.delete');
    Route::get('/supplier', [SupplierController::class, 'index'])->name('dashboard.supplier.index');
    Route::get('/supplier/create', [SupplierController::class, 'create'])->name('dashboard.supplier.create');
    Route::get('/supplier/{supplier}/edit', [SupplierController::class, 'edit'])->name('dashboard.supplier.edit');
    Route::post('/supplier/store', [SupplierController::class, 'store'])->name('dashboard.supplier.store');
    Route::put('/supplier/{supplier}', [SupplierController::class, 'update'])->name('dashboard.supplier.update');

    //Toko
    Route::delete('/toko/{toko}', [TokoController::class, 'destroy'])->name('dashboard.toko.delete');
    Route::get('/toko', [TokoController::class, 'index'])->name('dashboard.toko.index');
    Route::get('/toko/create', [TokoController::class, 'create'])->name('dashboard.toko.create');
    Route::get('/toko/{toko}/edit', [TokoController::class, 'edit'])->name('dashboard.toko.edit');
    Route::post('/toko/store', [TokoController::class, 'store'])->name('dashboard.toko.store');
    Route::put('/toko/{toko}', [TokoController::class, 'update'])->name('dashboard.toko.update');

    //Produk
    Route::delete('/produk/{produk}', [ProdukController::class, 'destroy'])->name('dashboard.produk.delete');
    Route::get('/produk', [ProdukController::class, 'index'])->name('dashboard.produk.index');
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('dashboard.produk.create');
    Route::get('/produk/{produk}/edit', [ProdukController::class, 'edit'])->name('dashboard.produk.edit');
    Route::post('/produk/store', [ProdukController::class, 'store'])->name('dashboard.produk.store');
    Route::put('/produk/{produk}', [ProdukController::class, 'update'])->name('dashboard.produk.update');

    //Barang Masuk
    Route::get('/barangmasuk', [BarangMasukController::class, 'index'])->name('dashboard.barangmasuk.index');
    Route::get('/barangmasuk/create', [BarangMasukController::class, 'create'])->name('dashboard.barangmasuk.create');
    Route::get('/barangmasuk/{barangMasuk}/edit', [BarangMasukController::class, 'edit'])->name('dashboard.barangmasuk.edit');
    Route::post('/barangmasuk/store', [BarangMasukController::class, 'store'])->name('dashboard.barangmasuk.store');
    Route::get('/barangmasuk/{barangMasuk}', [BarangMasukController::class, 'show'])->name('dashboard.barangmasuk.show');
    Route::delete('/barangmasuk/{barangMasuk}', [BarangMasukController::class, 'destroy'])->name('dashboard.barangmasuk.delete');
    Route::get('/barangmasuk/{barangMasuk}/print', [BarangMasukController::class, 'print'])->name('dashboard.barangmasuk.print');

    //Barang Keluar
    Route::get('/barangkeluar', [BarangKeluarController::class, 'index'])->name('dashboard.barangkeluar.index');
    Route::get('/barangkeluar/create', [BarangKeluarController::class, 'create'])->name('dashboard.barangkeluar.create');
    Route::get('/barangkeluar/{barangKeluar}/edit', [BarangKeluarController::class, 'edit'])->name('dashboard.barangkeluar.edit');
    Route::post('/barangkeluar/store', [BarangKeluarController::class, 'store'])->name('dashboard.barangkeluar.store');
    Route::get('/barangkeluar/{barangKeluar}', [BarangKeluarController::class, 'show'])->name('dashboard.barangkeluar.show');
    Route::delete('/barangkeluar/{barangKeluar}', [BarangKeluarController::class, 'destroy'])->name('dashboard.barangkeluar.delete');
    Route::get('/barangkeluar/{barangKeluar}/print', [BarangKeluarController::class, 'print'])->name('dashboard.barangkeluar.print');


    Route::get('/laporan/produk', [LaporanController::class, 'produk'])->name('dashboard.laporan.produk');
    Route::get('/laporan/produk/print', [LaporanController::class, 'print_produk'])->name('dashboard.laporan.produk.print');


    Route::get('/laporan/barangkeluar', [LaporanController::class, 'barang_keluar'])->name('dashboard.laporan.barangkeluar');
    Route::get('/laporan/barangkeluar/print', [LaporanController::class, 'print_barang_keluar']);

    Route::get('/laporan/barangmasuk', [LaporanController::class, 'barang_masuk'])->name('dashboard.laporan.barangmasuk');
    Route::get('/laporan/barangmasuk/print', [LaporanController::class, 'print_barang_masuk']);
});
