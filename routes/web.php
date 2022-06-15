<?php

use App\Models\Report;
use App\Models\Gallery;
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
    return view('site.index', [
        'galleries' => Gallery::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware(['auth'])->group(function () {

    Route::get('/admin', function () {
        $total_inbox = Report::all()->count();
        $total_need_confirm = Report::where('status', 'butuh konfirmasi')->get()->count();

        return view('admin.dashboard.index', [
            'total_inbox' => $total_inbox,
            'total_need_confirm' => $total_need_confirm
        ]);
    });

    Route::resource('/admin/reports', ReportController::class);
    Route::put('/admin/reports/{reports:id}/update-status/{status}', [ReportController::class, 'updateStatus']);

    Route::resource('/admin/galleries', GalleryController::class);

    Route::resource('/admin/users', UserController::class);
    Route::put('/admin/users/{users:id}/update-status/{status}', [UserController::class, 'updateStatus']);


});