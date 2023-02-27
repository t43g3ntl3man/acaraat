<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FloorPlanController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UnitFeatureController;
use App\Http\Controllers\FloorPlanFeatureController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('developer/login', [AuthController::class, 'login']);
Route::post('developer/register', [AuthController::class, 'register']);



Route::post('developer/project/create', [ProjectController::class, 'createProject']);
Route::post('developer/floorplan/create', [FloorPlanController::class, 'createFloorPlan']);
Route::post('developer/floorplan/edit', [FloorPlanController::class, 'editFloorPlan']);
Route::post('developer/unit/create', [UnitController::class, 'createUnit']);
Route::post('developer/add-unit-feature', [UnitFeatureController::class, 'createFeature']);
Route::post('developer/add-floor-plan-feature', [FloorPlanFeatureController::class, 'createFeature']);

Route::get('developer/project/form-get', [ProjectController::class, 'projectFormGet']);
Route::get('developer/project/listing', [ProjectController::class, 'projectListing']);
Route::get('developer/project/{id}', [ProjectController::class, 'projectById']);
Route::get('developer/floor-plan/create-form-get', [FloorPlanController::class, 'floorPlanCreateGet']);
Route::get('developer/floor-plan/edit-form-get', [FloorPlanController::class, 'floorPlanEditGet']);
Route::get('developer/unit-create-get', [UnitController::class, 'unitCreateGet']);