<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\EmailController;


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
//     return view('login');
// });
Route::get('/register', function () {
    return view('register');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::post('/check-email', [EmailController::class, 'checkEmail']);
});
Route::get('/home', function () {
    return redirect('admin');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/admin', [AdminController::class, 'index'])->middleware('userAccess:user');
    Route::get('/admin/admin', [AdminController::class, 'admin'])->middleware('userAccess:admin');
    Route::get('/admin/superAdmin', [AdminController::class, 'superAdmin'])->middleware('userAccess:super admin');
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/logout', [LoginController::class, 'logout']);
});
