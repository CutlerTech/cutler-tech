<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/projects', function () {
    return view('projects');
})->name('projects');
Route::get('/skills', function () {
    return view('skills');
})->name('skills');
// Public request form
Route::get('/requests', [RequestsController::class, 'create'])->name('requests.create');
Route::post('/requests', [RequestsController::class, 'store'])->name('requests.store');
// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Protected routes (require authentication)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Admin request management
    Route::get('/admin/requests', [RequestsController::class, 'index'])->name('requests.index');
    Route::get('/admin/requests/{request}', [RequestsController::class, 'show'])->name('requests.show');
    Route::delete('/admin/requests/{request}', [RequestsController::class, 'destroy'])->name('requests.destroy');
    Route::patch('/admin/requests/{request}/status', [RequestsController::class, 'updateStatus'])->name('requests.updateStatus');
});