<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CostCategoryController;
use App\Http\Controllers\Backend\CostController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DashboarController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\RevenueCategoryController;
use App\Http\Controllers\Backend\RevenueController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\StoreInController;
use App\Http\Controllers\Backend\UnitController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\WarhouseController;
use App\Http\Controllers\FakeIdController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});




Route::get('/dashboard', [UserDashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

// Route::get('/admin/dashboard', function () {
//     return view('backend.dashboard');
// })->middleware(['auth:admin', 'verified'])->name('admin.dashboard');


Route::resource('cost-categories', CostCategoryController::class)->middleware(['auth:web', 'verified']);
Route::resource('cost', CostController::class)->middleware(['auth:web', 'verified']);
Route::resource('revenue-categories', RevenueCategoryController::class)->middleware(['auth:web', 'verified']);
Route::resource('revenue', RevenueController::class)->middleware(['auth:web', 'verified']);
Route::resource('fake-ids', FakeIdController::class)->middleware(['auth:web', 'verified']);







Route::get('/admin/dashboard', [DashboarController::class, 'index'])->name('admin.dashboard')->middleware(['auth:admin', 'verified']);
require __DIR__ . '/adminauth.php';

Route::resource('users', UserController::class)->middleware(['auth:admin', 'verified']);
Route::resource('admins', AdminController::class)->middleware(['auth:admin', 'verified']);

Route::resource('customers', CustomerController::class)->middleware(['auth:admin', 'verified']);
Route::resource('warhouses', WarhouseController::class)->middleware(['auth:admin', 'verified']);
Route::resource('units', UnitController::class)->middleware(['auth:admin', 'verified']);
Route::resource('categories', CategoryController::class)->middleware(['auth:admin', 'verified']);
Route::resource('products', ProductController::class)->middleware(['auth:admin', 'verified']);
Route::resource('roles', RoleController::class)->middleware(['auth:admin', 'verified']);
Route::resource('permissions', PermissionController::class)->middleware(['auth:admin', 'verified']);


Route::resource('stores', StoreInController::class)->middleware(['auth:admin', 'verified']);

// Get Product
Route::get('get-product', [ProductController::class, 'get_product'])->name('get-product')->middleware(['auth:admin', 'verified']);

// Setting
Route::GET('settings', [SettingController::class, 'create'])->name('setting')->middleware(['auth:admin', 'verified']);
Route::POST('settings-store', [SettingController::class, 'store'])->name('setting.store')->middleware(['auth:admin', 'verified']);
Route::POST('settings-update/{id}', [SettingController::class, 'update'])->name('setting.update')->middleware(['auth:admin', 'verified']);
