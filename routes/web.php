<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class);


// Authentication and Registration Routes
Route::prefix('auth')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/loginsubmit', [AuthController::class, 'loginsubmit'])->name('auth.loginsubmit');

    // Registration routes for companies
    Route::get('/register-company', [AuthController::class, 'registercompany'])->name('auth.registercompany');
    Route::post('/register-company-submit', [AuthController::class, 'registerCompanySubmit'])->name('auth.registercompanysubmit');

});

