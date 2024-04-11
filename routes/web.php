<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\ForntendController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\ProfileUpdateController;
use App\Http\Controllers\Admin\AdminAuthController;
use Illuminate\Support\Facades\Route;


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
//     return view('frontend.home.index');
// });
// Admin Auth Route Start
Route::group(['middleware' => 'guest'],function(){
    Route::get('admin/login',[AdminAuthController::class,'index'])->name('admin.login');

});
// Admin Auth Route End
Route::get('/',[ForntendController::class,'index'])->name('home');

Route::group(['middleware' => 'auth'],function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::put('profile',[ProfileUpdateController::class,'updateProfile'])->name('profile.update');
    Route::put('profile/password',[ProfileUpdateController::class,'updatePassword'])->name('profile.password.update');
    Route::post('profile/avatar',[ProfileUpdateController::class,'updateavatar'])->name('profile.avatar.update');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


require __DIR__.'/auth.php';

