<?php

use App\Http\Controllers\API\AnnonceController;
use App\Http\Controllers\API\CustomerApiController;
use App\Http\Controllers\API\DriverApiController;
use App\Http\Controllers\API\SecurityController;
use App\Http\Controllers\API\StaticController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('authenticate', [SecurityController::class, 'authenticate']);
Route::get('accounts/customer/{id}', [SecurityController::class, 'getCustomerAccount']);
    Route::post('create-customer', [CustomerApiController::class, 'createCustomer']);
    Route::get('get-position-driver', [CustomerApiController::class, 'getPositionDriverByPlace']);
    Route::post('create-driver', [DriverApiController::class, 'createDriver']);
Route::post('vehicles', [DriverApiController::class, 'createVehiculeDriver']);
Route::post('annonces', [DriverApiController::class, 'addAnnonce']);
Route::get('vehicles/{id}', [DriverApiController::class, 'getVehicle']);
Route::get('annonces/passengers/{id}', [DriverApiController::class, 'getPassagers']);
Route::get('annonces/driver/{id}', [DriverApiController::class, 'listAnonces']);
Route::get('annonces', [AnnonceController::class, 'listAnnonces']);
Route::get('annonces/{id}/one', [AnnonceController::class, 'getOne']);
Route::get('annonces/search', [AnnonceController::class, 'searchAnnonces']);
Route::post('annonces/selected', [AnnonceController::class, 'seletedAnnonce']);
Route::get('annonces/selected/{code}', [CustomerApiController::class, 'announceByCode']);
//Route::post('annonces/selected', [AnnonceController::class, 'createAnnonce']);
Route::get('annonce_selecteds/customer/{id}', [CustomerApiController::class, 'myAnnounce']);
Route::get('cities', [StaticController::class, 'cities']);
Route::get('regions', [StaticController::class, 'regions']);

