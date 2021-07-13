<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Yazilar;
use App\Http\Controllers\Kategori;
use App\Http\Controllers\SlugKontrol;
use App\Http\Controllers\Anasayfa;
use App\Http\Controllers\Kullanicilar;
use App\Http\Controllers\YorumlarController;

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

Route::get('/', Anasayfa::class)->name('anasayfa');

Route::get('/hakkimizda', function () {
    return view('hakkimizda');
});

Route::get('/yorum', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('yorum', YorumlarController::class);
});

Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin');
    })->name('admin');
    
    Route::get('/yazilar',[Yazilar::class,'yazilar'])->name('yazilar');
    Route::get('/yeniyazi', Yazilar::class)->name('yeniyazi');
    Route::post('/yaziekle', [Yazilar::class, 'yaziekle'])->name('yaziekle');
    Route::delete('/yazisil/{yaziid}', [Yazilar::class,'yazisil'])->name('yazisil');
    Route::get('/yaziduzenle/{yaziid}', [Yazilar::class,'yaziduzenle'])->name('yaziduzenle');
    Route::put('/yaziguncelle/{yaziid}', [Yazilar::class,'yaziguncelle'])->name('yaziguncelle');
    Route::put('/onecikar/{yaziid}',[Yazilar::class,'onecikar'])->name('onecikar');

    Route::resource('/kategoriler', Kategori::class);

    Route::resource('/kullanicilar', Kullanicilar::class);
});
require __DIR__.'/auth.php';
Route::get('/{slug}',SlugKontrol::class);
