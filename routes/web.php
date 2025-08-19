<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Contracts\View\View;
Route::get('/', function (): View {
    return view('home');
})->name('home');
Route::get('/about', function (): View {
    return view('about');
})->name('about');
Route::get('/skills', function (): View {
    return view('skills');
})->name('skills');
Route::get('/requests', [RequestsController::class, 'create'])->name('requests.create');// Public request form
Route::post('/requests', [RequestsController::class, 'store'])->name('requests.store');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');// Authentication routes
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function (): void {// Protected routes (require authentication)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/requests', [RequestsController::class, 'index'])->name('requests.index');// Admin request management
    Route::get('/admin/requests/{request}', [RequestsController::class, 'show'])->name('requests.show');
    Route::delete('/admin/requests/{request}', [RequestsController::class, 'destroy'])->name('requests.destroy');
    Route::patch('/admin/requests/{request}/status', [RequestsController::class, 'updateStatus'])->name('requests.updateStatus');
    // Notification routes
    Route::get('/notifications', [RequestsController::class, 'notifications'])->name('notifications.index');
    Route::get('/notifications/{notification}/mark-read', [RequestsController::class, 'markAsRead'])->name('notifications.mark-read');
    Route::get('/notifications/mark-all-read', [RequestsController::class, 'markAllAsRead'])->name('notifications.mark-all-read');
});