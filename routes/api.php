<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembershipController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/membership', [MembershipController::class, 'indexApi']);
Route::get('/newMembership', [MembershipController::class, 'indexApi']);
Route::get('/listing/{email}', [MembershipController::class, 'list_subscribe_user']);
//
Route::get('/listings/{email}', [MembershipController::class, 'list_subscribe_users']);

Route::post('/share', [MembershipController::class, 'share']);
Route::get('/categories', [MembershipController::class, 'categoryList']);
Route::post('/create-preference-category', [MembershipController::class, 'createPreferenceCategory']);
Route::post('/klientale-contact-share', [MembershipController::class, 'klientale_contact_share']);
Route::delete('/klientale-contact-delete/{id}', [MembershipController::class, 'klientale_contact_delete']);