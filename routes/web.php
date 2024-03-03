<?php

use App\Models\Album;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteRegistrar;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ExploreController;

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

// Route::get('/', function () {
//     return view('detail_foto');
// });


//Index
Route::get('/', [UserController::class, 'index']);

//Login & Register
Route::get('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'register']);

//Proses Login dan Register
Route::post('/proses_login', [UserController::class, 'proses_login']);
Route::post('/proses_register', [UserController::class, 'proses_register']);

//Javascript

Route::middleware(['users'])->group(function() {


//Beranda User
Route::get('/beranda_user' ,[UserController::class, 'beranda_user']);

//Tambah Album & Album
Route::get('/tambah_album', [AlbumController::class, 'tambah_album']);
Route::post('/proses_simpan_album', [AlbumController::class, 'prosestambah_album']);
Route::post('/proses_simpan_album1', [AlbumController::class, 'prosestambah_album1']);
Route::get('/album', [AlbumController::class, 'album']);

//Logout
Route::get('/logout', [UserController::class, 'logout']);

//Upload Foto & Prosesnya
Route::get('/upload_foto', [UploadController::class, 'upload_foto']);
Route::post('/proses_upload', [UploadController::class, 'proses_upload']);

//Upadte Password
Route::get('/update_password', [UpdateController::class, 'update_password']);
Route::post('/prosesup_password', [UpdateController::class, 'prosesupdate_pw']);

//profile
Route::get('/profile', [UpdateController::class, 'profile']);
Route::post('/update_profile', [UpdateController::class, 'update_profile']);
Route::post('/foto_profile', [UpdateController::class, 'fotoprofile']);

Route::get('/detail_foto/{id}', [FotoController::class, 'detailfoto']);


Route::get('/getDataExplore',[ExploreController::class, 'getdata']);
Route::get('/explore-detail/{id}/getdatadetail',[ExploreController::class, 'getdatadetail']);
Route::get('/explore-detail/getkomen/{id}',[ExploreController::class, 'ambildatakomentar']);
Route::post('/explore-detail/kirimkomentar',[ExploreController::class, 'kirimkomentar']);
Route::POST('/explore-detail/ikuti',[ExploreController::class, 'ikuti']);
Route::POST('/explore-detail/ikutidiprofile',[ExploreController::class, 'ikuti']);

Route::POST('/likesfoto', [ExploreController::class, 'likesfoto']);
Route::post('/likesfotopublic', [ExploreController::class, 'likesfotopublik']);
Route::get('/profile_public/{id}',[ExploreController::class, 'profile_publik']);
Route::get('/dalemanpublic/{id}',[ExploreController::class, 'dalemanpublic']);
Route::get('/getDataPublic/{id}', [ExploreController::class, 'getdatapublic']);

Route::get('/dalemanalbum/{id}', [AlbumController::class, 'dalemanalbum']);


Route::delete('/dalemanalbum/{foto}', [AlbumController::class, 'hapusfoto'])->name('dalemanalbum.destroy');
Route::delete('/album/{foto}', [AlbumController::class, 'hapusfotodialbum'])->name('album.destroy');
Route::delete('/hapusalbuma/{foto}', [AlbumController::class, 'hapusalbum'])->name('albuma.destroy');

Route::get('/report/{id}', [ReportController::class, 'report']);
Route::POST('/kirimreport/{id}', [ReportController::class, 'kirimreport']);
});


Route::middleware(['admin'])->group(function() {
Route::get('/adminds', [AdminController::class, 'adminds']);
Route::get('/dataalbum', [AdminController::class, 'dataalbum']);
Route::get('/datareport', [AdminController::class, 'datareport']);
Route::delete('/hapususer/{id}', [AdminController::class, 'hapususer']);
Route::delete('/hapusalbum/{id}', [AdminController::class, 'hapusalbum']);
Route::delete('/datareport/{id}', [AdminController::class, 'hapusreport'])->name('hapusreport');
Route::get('/logoutadmin', [AdminController::class, 'logoutdiadmin']);

});
