<?php
use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\WhyChooseUsController;

Route::group(['prefix' => 'admin','as' => 'admin.'],function(){
    Route::get('dashboard',[AdminDashboardController::class,'index'])->name('dashboard');
    // profile route
    Route::get('profile',[ProfileController::class,'index'])->name('profile');
    Route::put('profile',[ProfileController::class,'updateProfile'])->name('profile.update');
    Route::put('profile/password',[ProfileController::class,'updatePassword'])->name('profile.password.update');

    // slider Route
    Route::resource('slider',SliderController::class);
    // why Choose Us Route
    Route::put('why-choose-us-title-update',[WhyChooseUsController::class,'updateTitle'])->name('why-choose-us-title.update');
    Route::resource('why-choose-us',WhyChooseUsController::class);

});
?>
