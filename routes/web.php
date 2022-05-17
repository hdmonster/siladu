<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\GalleryController;

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
    return view('site.index');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');


Route::get('/admin', function () {
    return view('admin.dashboard.index');
});

Route::resource('/admin/reports', ReportController::class);
Route::put('admin/reports/{reports:uuid}/update-status/{status}', [ReportController::class, 'updateStatus']);

Route::resource('/admin/galleries', GalleryController::class);

Route::resource('/admin/users', UserController::class);
Route::put('/admin/users/{users:id}/update-status/{status}', [UserController::class, 'updateStatus']);
// Route::middleware(['auth'])->group(function () {


// });