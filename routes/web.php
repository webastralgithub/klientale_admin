<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\MembershipController as AdminMembershipController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\BusinessController;
use \App\Http\Controllers\PricingController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MembershipController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
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


Route::get('/testuser', function () {
    $userData = User::find(1);
    $crypt = Crypt::encrypt($userData->email);

    echo "EMAIL::" . $crypt;
    echo ' ||| ';
    echo "EMAIL::" . Crypt::decrypt($crypt);
});


Route::get('/admin', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    } else {
        return view('auth.login');
    }
});

Auth::routes();
// Route::middleware(['auth', 'isAdminWebAccess'])->group(function () {
//     Route::get('/', [HomeController::class, 'index'])->name('home');
// });
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/home', [HomeController::class, 'index'])->name('home');


//business
Route::get('/business', [BusinessController::class, 'index'])->name('business');

//pricing
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');

//membership
Route::get('/membership', [MembershipController::class, 'index'])->name('membership');
Route::post('/subscribe', [MembershipController::class, 'subscribe'])->name('subscribe');



Route::get('/login', [LoginController::class, 'loginRegister'])->name('login');
Route::post('post-login', [LoginController::class, 'postLogin'])->name('login.post');
Route::post('post-register', [RegisterController::class, 'register_post'])->name('login.register');
Route::get('/verify/{code}', [RegisterController::class, 'verifyUser'])->name('verify.user');
Route::middleware(['auth', 'isAdminAccess'])->group(function () {
    //dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resources([
        'roles' => RoleController::class,
        'users' => UserController::class,
        'permissions' => PermissionController::class,
        'admin/membership' => AdminMembershipController::class,
    ]);
});
