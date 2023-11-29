<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

Route::get('/', [AdminController::class, 'index'])->name('admin.index');
Route::get('ascend', [AdminController::class, 'ascend'])->name('admin.ascend');
Route::get('descend', [AdminController::class, 'descend'])->name('admin.descend');
Route::get('add', [AdminController::class, 'create'])->name('admin.create');
Route::post('store', [AdminController::class, 'store'])->name('admin.store');
Route::get('edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::post('update/{id}', [AdminController::class, 'update'])->name('admin.update');
Route::post('delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');   
// Route::get('/', [AdminController::class, 'index'])->name('pabrik.index');
// Route::get('add', [AdminController::class, 'create'])->name('pabrik.create');
// Route::post('store', [AdminController::class, 'store'])->name('pabrik.store');
// Route::get('edit/{id}', [AdminController::class, 'edit'])->name('pabrik.edit');
// Route::post('update/{id}', [AdminController::class, 'update'])->name('pabrik.update');
// Route::post('delete/{id}', [AdminController::class, 'delete'])->name('pabrik.delete');
{
};
