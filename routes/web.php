<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasetController;
use App\Http\Controllers\StaffController;
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

Route::get('/kaset', [KasetController::class, 'index'])->name('kaset.index');
Route::get('ascendkaset', [KasetController::class, 'ascend'])->name('kaset.ascend');
Route::get('descendkaset', [KasetController::class, 'descend'])->name('kaset.descend');
Route::get('addkaset', [KasetController::class, 'create'])->name('kaset.create');
Route::post('storekaset', [KasetController::class, 'store'])->name('kaset.store');
Route::get('editkaset/{id}', [KasetController::class, 'edit'])->name('kaset.edit');
Route::post('updatekaset/{id}', [KasetController::class, 'update'])->name('kaset.update');
Route::post('softdeletekaset/{id}', [KasetController::class, 'softDelete'])->name('kaset.softdelete');
Route::get('restorekaset/{id}', [KasetController::class, 'restore'])->name('kaset.restore');
Route::post('deletekaset/{id}', [KasetController::class, 'delete'])->name('kaset.delete');
Route::get('search-{status}', [KasetController::class, 'search'])->name('kaset.search');

Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
Route::get('ascendstaff', [StaffController::class, 'ascend'])->name('staff.ascend');
Route::get('descendstaff', [StaffController::class, 'descend'])->name('staff.descend');
Route::get('addstaff', [StaffController::class, 'create'])->name('staff.create');
Route::post('storestaff', [StaffController::class, 'store'])->name('staff.store');
Route::get('editstaff/{id}', [StaffController::class, 'edit'])->name('staff.edit');
Route::post('updatestaff/{id}', [StaffController::class, 'update'])->name('staff.update');
Route::post('softdeletestaff/{id}', [StaffController::class, 'softDelete'])->name('staff.softdelete');
Route::get('restorestaff/{id}', [StaffController::class, 'restore'])->name('staff.restore');
Route::post('deletestaff/{id}', [StaffController::class, 'delete'])->name('staff.delete');

Route::get('/bin', [AdminController::class, 'bin'])->name('admin.bin');
Route::get('/bindua', [AdminController::class, 'bindua'])->name('admin.bindua');

// Route::get('/', [AdminController::class, 'index'])->name('pabrik.index');
// Route::get('add', [AdminController::class, 'create'])->name('pabrik.create');
// Route::post('store', [AdminController::class, 'store'])->name('pabrik.store');
// Route::get('edit/{id}', [AdminController::class, 'edit'])->name('pabrik.edit');
// Route::post('update/{id}', [AdminController::class, 'update'])->name('pabrik.update');
// Route::post('delete/{id}', [AdminController::class, 'delete'])->name('pabrik.delete');
{
};
