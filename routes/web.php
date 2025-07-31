<?php
use Illuminate\Support\Facades\Route;
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
Route::get('/requests', function () {
    return view('requests');
})->name('requests');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::get('/dashboard', function () {
    return view('users.dashboard');
})->name('dashboard');