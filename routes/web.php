<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('/', [App\Http\Controllers\FrontController::class,'index'])->name('front.home');
Route::get('/gallery', [App\Http\Controllers\FrontController::class,'gallery'])->name('front.gallery');
Route::get('/contactus', [App\Http\Controllers\FrontController::class,'contactus'])->name('front.contactus');
Route::post('/contactus', [App\Http\Controllers\FrontController::class,'store'])->name('front.contactus.store');
Route::get('/aboutus', [App\Http\Controllers\FrontController::class,'aboutus'])->name('front.aboutus');


Auth::routes();

Route::middleware('admin')->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/home/slider',App\Http\Controllers\Administrator\SliderController::class);
    Route::resource('/home/dialogue',App\Http\Controllers\Administrator\DialogueController::class);
    Route::resource('/home/founder',App\Http\Controllers\Administrator\FounderController::class);
    Route::resource('/home/aboutus',App\Http\Controllers\Administrator\AbotusController::class);
    Route::resource('/home/contactinfo',App\Http\Controllers\Administrator\ContactinfoController::class);
    Route::resource('/home/album',App\Http\Controllers\Administrator\AlbumController::class);
    Route::resource('/home/album.photo',App\Http\Controllers\Administrator\PhotoController::class)->shallow();
    Route::resource('/home/library',App\Http\Controllers\Administrator\LibraryController::class);
    Route::resource('/home/information',App\Http\Controllers\Administrator\InformationController::class);
});

Route::middleware('student')->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'indexStudent'])->name('student.home');
});  

Route::middleware('teacher')->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'indexTeacher'])->name('teacher.home');
});

