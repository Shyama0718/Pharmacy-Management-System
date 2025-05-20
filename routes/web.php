<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\TaskController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::middleware(['auth','superadmin'])->group(function () {

//     Route::get('superadmin/dashboard',[SuperAdminController::class, 'index']);

// });
Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::get('superadmin/dashboard', [SuperAdminController::class, 'index'])->name('superadmin.dashboard');
    Route::get('/superadmin/addadmin', [SuperAdminController::class, 'addAdmin'])->name('superadmin.addadmin');
    Route::get('/superadmin/addadmin', [SuperAdminController::class, 'showAddAdminForm'])->name('superadmin.addadmin');
    Route::post('/superadmin/addadmin', [SuperAdminController::class, 'addAdmin'])->name('superadmin.storeadmin');
});
// Route::middleware(['auth', 'superadmin'])->group(function () {
//     Route::get('superadmin/dashboard', [SuperAdminController::class, 'index'])->name('superadmin.dashboard');

//     Route::get('/superadmin/addadmin', [SuperAdminController::class, 'showAddAdminForm'])->name('superadmin.addadmin');
//     Route::post('/superadmin/addadmin', [SuperAdminController::class, 'addAdmin'])->name('superadmin.storeadmin');
// });

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('admin/dashboard', [AdminController::class, 'index']);
    Route::get('/admin/product', [ProductController::class, 'index'])->name('admin.product');
    Route::get('/admin/product/add', [ProductController::class, 'create'])->name('admin.product.add');
    Route::post('/admin/product/store', [ProductController::class, 'store'])->name('medicine.store');
    Route::get('/admin/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('/admin/product/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::get('/admin/product/delete/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');
    Route::get('/admin/get-categories', [ProductController::class, 'getCategories'])->name('get.categories');


});
// Route::get('/landmark-medicines', [ProductController::class, 'showLandmarkMedicines'])->name('landmark.medicines');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/medicines/{id}', [MedicineController::class, 'show'])->name('medicine.show');



Route::resource('tasks', TaskController::class);

require __DIR__ . '/auth.php';
