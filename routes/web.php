<?php


use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WorkUnitController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DispositionController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\IncomingMailController;
use App\Http\Controllers\OutgoingMailController;
use App\Http\Controllers\SubmissionMailController;
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



Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::group(['namespace' => 'App\Http\Controllers'], function(){
    Route::middleware(['auth', 'role:0'])->group(function(){
        Route::get('/home', [HomeController::class, 'home'])->name('home');
        Route::post('/submission', [SubmissionMailController::class, 'submission'])->name('user.submission');
    });
    Route::middleware(['auth', 'role:1'])->group(function(){
        Route::prefix('admin')->group(function(){
            Route::get('/', [HomeController::class, 'admin'])->name('admin');
            Route::get('/pengaturan', [HomeController::class, 'setting'] )->name('setting');
            Route::get('/instansi', [InstitutionController::class, 'list'])->name('institution');

            Route::controller(IncomingMailController::class)->group(function (){
                Route::get('/suratMasuk', 'list')->name('incomingMail');
                Route::get('/suratMasuk/create', 'create')->name('incomingMail.create');
                Route::post('/suratMasuk/add', 'add')->name('incomingMail.add');
                Route::get('/suratMasuk/edit/{incomingMail}', 'edit')->name('incomingMail.edit');
                Route::post('/suratMasuk/update/{id}', 'update')->name('incomingMail.update');
                Route::delete('/suratMasuk/destroy/{id}', 'destroy')->name('incomingMail.destroy');
                Route::get('/suratMasuk/detail/{incomingMail}', 'detail')->name('incomingMail.detail');
                Route::get('/suratMasuk/disposition/{incomingMail}', 'disposition')->name('incomingMail.disposition');
                Route::post('/suratMasuk/disposition/{id}', 'adddisposition')->name('incomingMail.adddisposition');
            });
            Route::controller(OutgoingMailController::class)->group(function (){
                Route::get('/suratKeluar', 'list')->name('outgoingMail');
                Route::get('/suratKeluar/create', 'create')->name('outgoingMail.create');
                Route::post('/suratKeluar/add', 'add')->name('outgoingMail.add');
                Route::get('/suratKeluar/edit/{outgoingMail}', 'edit')->name('outgoingMail.edit');
                Route::post('/suratKeluar/update/{id}', 'update')->name('outgoingMail.update');
                Route::delete('/suratKeluar/destroy/{id}', 'destroy')->name('outgoingMail.destroy');
                Route::get('/suratKeluar/detail/{outgoingMail}', 'detail')->name('outgoingMail.detail');
            });
            Route::controller(FileController::class)->group(function (){
                Route::get('/suratMasuk/file/view/{file_path}', 'view')->name('incomingMail.file.view');
                Route::post('/suratKeluar/file/upload/{id}', 'upload')->name('outgoingMail.file.upload');
                Route::get('/suratKeluar/file/view/{file_path}', 'view')->name('outgoingMail.file.view');
            });
            Route::controller(SubmissionMailController::class)->group(function (){
                Route::get('/suratPengajuan', 'list')->name('submissionMail');
                Route::get('/suratPengajuan/disposition/{submissionMail}', 'disposition')->name('submissionMail.disposition');
                Route::post('/suratPengajuan/disposition/{id}', 'adddisposition')->name('submissionMail.adddisposition');
            });
            Route::controller(WorkUnitController::class)->group(function (){
                Route::get('/unitKerja', 'list')->name('workUnit');
                Route::get('/unitKerja/create', 'create')->name('workUnit.create');
                Route::post('/unitKerja/add', 'add')->name('workUnit.add');
                Route::get('/unitKerja/edit/{workUnit}', 'edit')->name('workUnit.edit');
                Route::post('/unitKerja/update/{id}', 'update')->name('workUnit.update');
                Route::delete('/unitKerja/destroy/{id}', 'destroy')->name('workUnit.destroy');
            });
            Route::controller(UserController::class)->group(function (){
                Route::get('/pengguna', 'list')->name('user');
                Route::get('/pengguna/create', 'create')->name('user.create');
                Route::post('/pengguna/add', 'add')->name('user.add');
                Route::get('/pengguna/edit/{user}', 'edit')->name('user.edit');
                Route::post('/pengguna/update/{id}', 'update')->name('user.update');
                Route::delete('/pengguna/destroy/{id}', 'destroy')->name('user.destroy');
            });
            Route::controller(DispositionController::class)->group(function (){
                Route::get('/disposisi', 'list')->name('disposition');
                Route::get('/disposisi/create', 'create')->name('disposition.create');
                Route::post('/disposisi/add', 'add')->name('disposition.add');
                Route::get('/disposisi/edit/{disposition}', 'edit')->name('disposition.edit');
                Route::post('/disposisi/update/{id}', 'update')->name('disposition.update');
                Route::delete('/disposisi/destroy/{disposition}', 'destroy')->name('disposition.destroy');
            });
            Route::controller(CategoryController::class)->group(function (){
                Route::get('/kategori', 'list')->name('category');
                Route::get('/kategori/create', 'create')->name('category.create');
                Route::post('/kategori/add', 'add')->name('category.add');
                Route::get('/kategori/edit/{category}', 'edit')->name('category.edit');
                Route::post('/kategori/update/{id}', 'update')->name('category.update');
                Route::delete('/kategori/destroy/{id}', 'destroy')->name('category.destroy');
            });
            Route::controller(ReportController::class)->group(function (){
                Route::get('/laporanSuratMasuk', 'incomingMail')->name('report.incomingMail');
                Route::post('/laporanSuratMasuk', 'incomingMailSearch')->name('report.incomingMail.search');
                Route::post('/laporanSuratMasuk/export', 'incomingMailExport')->name('report.incomingMail.export');
                Route::get('/laporanSuratKeluar', 'outgoingMail')->name('report.outgoingMail');
                Route::post('/laporanSuratKeluar', 'outgoingMailSearch')->name('report.outgoingMail.search');
                Route::post('/laporanSuratKeluar/export', 'outgoingMailExport')->name('report.outgoingMail.export');
            });
        });
    });
    Route::middleware(['auth', 'role:2'])->group(function(){
        Route::prefix('operator')->group(function(){
            Route::get('/', [HomeController::class, 'operator'])->name('operator');
            Route::controller(IncomingMailController::class)->group(function (){
                Route::get('/suratMasuk','list')->name('operator.incomingMail');
                Route::get('/suratMasuk/{incomingMail}','detail')->name('operator.incomingMail.detail');
                Route::post('/suratMasuk/archive/{id}','archive')->name('operator.incomingMail.archive');
                Route::get('/suratMasuk/disposition/{incomingMail}', 'disposition')->name('operator.incomingMail.disposition');
                Route::post('/suratMasuk/disposition/{id}', 'adddisposition')->name('operator.incomingMail.adddisposition');
            });
            Route::controller(IncomingMailController::class)->group(function (){
                Route::get('/suratMasuk/file/view/{file_path}', 'view')->name('operator.file.view');
                Route::get('/suratKeluar/file/view/{file_path}', 'view')->name('operator.file.view');
            });
            Route::controller(OutgoingMailController::class)->group(function (){
                Route::get('/suratKeluar', 'list')->name('operator.outgoingMail');
                Route::get('/suratKeluar/{outgoingMail}', 'detail')->name('operator.outgoingMail.detail');
                Route::post('/suratKeluar/archive/{id}', 'archive')->name('operator.outgoingMail.archive');
                Route::get('/suratKeluar/disposition/{outgoingMail}', 'disposition')->name('operator.outgoingMail.disposition');
                Route::post('/suratKeluar/disposition/{id}', 'adddisposition')->name('operator.outgoingMail.adddisposition');
            });
        });
    });
});



