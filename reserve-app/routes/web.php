<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontend\ReservationController as FrontendReservationController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserreservationController;
use App\Http\Controllers\CancellationController;
use Illuminate\Support\Facades\Route;


Route::get('/', [WelcomeController::class, 'index']);
Route::get('/categories', [FrontendCategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [FrontendCategoryController::class, 'show'])->name('categories.show');
Route::get('/menus', [FrontendMenuController::class, 'index'])->name('menus.index');
Route::get('/reservation/step-one', [FrontendReservationController::class, 'stepOne'])->name('reservations.step.one');
Route::post('/reservation/step-one', [FrontendReservationController::class, 'storeStepOne'])->name('reservations.store.step.one');
Route::get('/reservation/step-two', [FrontendReservationController::class, 'stepTwo'])->name('reservations.step.two');
Route::post('/reservation/step-two', [FrontendReservationController::class, 'storeStepTwo'])->name('reservations.store.step.two');
Route::get('/thankyou', [WelcomeController::class, 'thankyou'])->name('thankyou');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['user'])->name('dashboard');

Route::get('/user/reservations/cancel', function () {
    return view('user.reservations.cancel');
})->middleware(['user'])->name('user.reservations.cancel');


Route::post('/cancellations', [CancellationController::class, 'store'])->name('cancellations.store');
Route::get('/cancellations/create', [CancellationController::class, 'create'])->name('cancellations.create');

 Route::get('/cancellations/show', [CancellationController::class, 'index'])->name('cancellations.index');


Route::middleware('user')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
 
    // Route::get('/user', [UserreservationController::class, 'index'])->name('user.reservations.index');
    Route::get('/user/reservations', [UserreservationController::class, 'index'])->name('user.reservations.index');

    Route::get('/user/reservations/edit', [UserreservationController::class, 'edit'])->name('user.reservations.edit');
    Route::put('/user/reservations/update', [UserreservationController::class, 'update'])->name('user.reservations.update');
    Route::delete('/user/reservations/delete', [UserreservationController::class, 'destroy'])->name('user.reservations.destroy');
  //  Route::resource('/user/create', [UserreservationController::class, 'index'])->name('index');
});


Route::middleware(['admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/menus', MenuController::class);
    Route::resource('/tables', TableController::class);
    Route::resource('/reservations', ReservationController::class);
});

// require __DIR__ . '/auth.php';


Route::get('/register', 'App\Http\Controllers\AuthController@showRegisterForm')->name('register');
Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::get('/login', 'App\Http\Controllers\AuthController@showLoginForm')->name('login');
Route::post('/login', 'App\Http\Controllers\AuthController@login');
Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

//Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard')->middleware('auth');