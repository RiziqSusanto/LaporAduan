<?php

use Illuminate\Support\Facades\Route;

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
// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/testing', function () {
//     return view('coba');
// });

Route::get('/', 'MasyarakatController@index')->name('masyarakat.index');

// Login Register Masyarakat
Route::get('/register', 'Auth\\RegisterController@FormRegisterMasyarakat');
Route::post('/register/store', 'Auth\\RegisterController@ActionRegisterMasyarakat')->name('masyarakat.register');
Route::get('/login', 'Auth\\LoginController@FormLoginMasyarakat');
Route::post('/login/post', 'Auth\\LoginController@ActionLoginMasyarakat')->name('masyarakat.login');

Route::get('/petugas/login', 'Auth\\LoginController@FormLoginPetugas');
Route::post('/petugas/login/post', 'Auth\\LoginController@ActionLoginPetugas')->name('petugas.login');

Route::get('/admin/register', 'Auth\\RegisterController@FormRegisterAdmin');

Route::get('/admin/login', 'Auth\\LoginController@FormLoginAdmin');
Route::post('/admin/login/post', 'Auth\\LoginController@ActionLoginAdmin')->name('admin.login');
Route::post('/admin/register/store', 'Auth\\RegisterController@ActionRegisterAdmin')->name('admin.register');

Route::middleware('masyarakat')->group(function(){
    Route::get('/pengaduan', 'MasyarakatController@FormPengaduan');
    Route::post('/pengaduan/simpan', 'MasyarakatController@simpanPengaduan')->name('masyarakat.pengaduan');
    Route::get('/data_pengaduan', 'MasyarakatController@dataPengaduan');
    Route::get('/data_pengaduan/detailpengaduan/{id}', 'MasyarakatController@detailPengaduan');
    Route::get('/logout', 'MasyarakatController@logout');
});

// Middleware Petugas
Route::middleware('petugas')->group(function(){
    Route::resource('petugas', 'PetugasController')->except('show');
    Route::get('/petugas/pengaduan', 'PetugasController@showPengaduan');
    Route::get('/petugas/pengaduan/{id}', 'PetugasController@detailPengaduan')->name('petugas.detailpengaduan');
    Route::get('/petugas/destroy/{id}', 'PetugasController@destroyPengaduan')->name('petugas.destroypengaduan');
    Route::get('/petugas/pengaduan/{id}/tanggapi', 'TanggapanController@formTanggapan');
    Route::post('/petugas/pengaduan/{id}/tanggapi', 'TanggapanController@storeTanggapan')->name('petugas.tanggapi');
    Route::get('/petugas/logout', 'PetugasController@logout');
    Route::post('/petugas/pengaduan/{id}', 'PetugasController@statusOnChange')->name('petugas.statusOnChange');
});

Route::middleware('admin')->group(function(){
    Route::resource('admin', 'AdminController')->except('show');
    Route::get('/admin/pengaduan', 'AdminController@showPengaduan');
    Route::get('/admin/pengaduan/{id}', 'AdminController@detailPengaduan')->name('admin.detailpengaduan');
    Route::get('/admin/destroy/{id}', 'AdminController@destroyPengaduan')->name('admin.destroypengaduan');
    Route::get('/admin/pengaduan/{id}/tanggapi', 'TanggapanController@formTanggapan');
    Route::post('/admin/pengaduan/{id}/tanggapi', 'TanggapanController@adminTanggapan')->name('admin.tanggapi');
    Route::post('/admin/pengaduan/{id}', 'AdminController@statusOnChange')->name('admin.statusOnChange');
    Route::get('/admin/cetakpdf', 'AdminController@cetakPdf')->name('admin.pdf');
    Route::get('/admin/pengaduans/cetakdetailpdf/{id}', 'AdminController@cetakDetailPdf')->name('admin.detailpdf');
    
    Route::get('/admin/petugas', 'AdminController@tablePetugas');
    Route::get('/admin/petugas/delete/{id}', 'AdminController@destroyPetugas')->name('admin.destroypetugas');
    Route::get('/admin/petugas/create', 'AdminController@formPetugas');
    Route::post('/admin/petugas', 'AdminController@storePetugas')->name('admin.storepetugas');
    Route::get('/admin/petugas/petugaspdf', 'AdminController@petugasPdf')->name('petugas.pdf');
    
    Route::get('/admin/masyarakat', 'AdminController@tableMasyarakat');
    Route::get('/admin/masyarakat/create', 'AdminController@formMasyarakat');
    Route::get('/admin/masyarakat/delete/{id}', 'AdminController@destroyMasyarakat')->name('admin.destroymasyarakat');
    Route::post('/admin/masyarakat', 'AdminController@storeMasyarakat')->name('admin.storemasyarakat');
    Route::get('/admin/masyarakat/masyarakatpdf', 'AdminController@masyarakatPdf')->name('admin.masyarakatpdf');
    Route::get('/admin/logout', 'AdminController@logout');
});