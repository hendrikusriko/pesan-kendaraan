<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\User\OrderApprovalController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['is_admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/home', [HomeController::class, 'adminHome'])->name('home');
    
    Route::name('vehicle.')->prefix('/vehicle')->group(function () {
        Route::get('/', [VehicleController::class, 'index'])->name('index');
        Route::get('/datatables', [VehicleController::class, 'dataTables'])->name('datatables');
        Route::get('/detail/{id}', [VehicleController::class, 'detail'])->name('detail');
        Route::get('/create', [VehicleController::class, 'create'])->name('create');
        Route::post('/store', [VehicleController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [VehicleController::class, 'edit'])->name('edit');
        Route::post('/store/{id}', [VehicleController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [VehicleController::class, 'delete'])->name('delete');
    });

    Route::name('driver.')->prefix('/driver')->group(function () {
        Route::get('/', [DriverController::class, 'index'])->name('index');
        Route::get('/datatables', [DriverController::class, 'dataTables'])->name('datatables');
        Route::get('/create', [DriverController::class, 'create'])->name('create');
        Route::post('/store', [DriverController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [DriverController::class, 'edit'])->name('edit');
        Route::post('/store/{id}', [DriverController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [DriverController::class, 'delete'])->name('delete');
    });

    Route::name('order.')->prefix('/order')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/datatables', [OrderController::class, 'dataTables'])->name('datatables');
        Route::get('/create', [OrderController::class, 'create'])->name('create');
        Route::post('/store', [OrderController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('edit');
        Route::post('/store/{id}', [OrderController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [OrderController::class, 'delete'])->name('delete');
    });
});


Route::get('home', [HomeController::class, 'index'])->middleware(['auth'])->name('home');
Route::middleware(['auth'])->name('approval.')->prefix('/approval')->group(function () {
    Route::get('/', [OrderApprovalController::class, 'index'])->name('index');
    Route::get('/datatables', [OrderApprovalController::class, 'dataTables'])->name('datatables');
    Route::get('/aprove/{id}', [OrderApprovalController::class, 'aprove'])->name('aprove');
    Route::get('/cancel/{id}', [OrderApprovalController::class, 'cancel'])->name('cancel');
});

