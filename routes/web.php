<?php

use App\Http\Controllers\GaleryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UpdateStatsController;
use App\Http\Controllers\UploadPhotoController;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\File;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('layouts.uploaddata');
// });


Route::get('/', [LoginController::class, 'index'])->name('/');
Route::post('/', [LoginController::class, 'postLogin'])->name('postlogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    // File::link(
    //     storage_path('app/public'), public_path('storage')
    // );

    //Updload Photo
    Route::get('/upload', [UploadPhotoController::class, 'index'])->name('upload');

    Route::post('/getNoPlat', [UploadPhotoController::class, 'getNoPlat'])->name('getNoPlat');

    Route::post('/saveuploadphoto', [UploadPhotoController::class, 'saveUploadPhoto'])->name('saveuploadphoto');

    Route::post('/countpict', [UploadPhotoController::class, 'countPict'])->name('countpict');

    //Update Status
    Route::get('/updatestats', [UpdateStatsController::class, 'index'])->name('updatestats');
    
    Route::post('/getNoPlatDetails', [UpdateStatsController::class, 'getNoPlatDetails'])->name('getNoPlatDetails');

    Route::post('/getpic', [UpdateStatsController::class, 'getPic'])->name('getpic');

    Route::get('/saveupdatestats', [UpdateStatsController::class, 'saveUpdateStats'])->name('saveupdatestats');

    Route::post('/getnotwoh', [UpdateStatsController::class, 'getNoTwoh'])->name('getnotwoh');

    Route::post('/gettwohdetails', [UpdateStatsController::class, 'getTwohDetails'])->name('gettwohdetails');

    // Reports
    Route::get('/reports', [ReportController::class, 'index'])->name('reports');

    Route::get('/viewreports', [ReportController::class, 'view'])->name('viewreports');

    // Galery
    Route::get('/galery', [GaleryController::class, 'index'])->name('galery');

    Route::post('/getimage', [GaleryController::class, 'getImage'])->name('getimage');

    Route::post('/updateupload', [GaleryController::class, 'updateUpload'])->name('updateupload');
});

