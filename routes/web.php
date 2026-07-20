<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClaimController;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view("about");
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/abouts',[AdminController::class, 'abouts'])->name('abouts'); 
Route::get('/blogs',[AdminController::class, 'blogs'])->name('blogs');
Route::get('/create', [AdminController::class, 'create'])->name('create');
Route::post('/insert', [AdminController::class, 'insert']);

Route::get('/claim', [AdminController::class, 'showClaimForm'])->name('claim.show');
Route::post('/claim', [AdminController::class, 'submitClaimForm'])->name('claim.submit');

Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return "เชื่อมต่อฐานข้อมูลสำเร็จ! Database name: " . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        return "ไม่สามารถเชื่อมต่อฐานข้อมูลได้: " . $e->getMessage();
    }
});