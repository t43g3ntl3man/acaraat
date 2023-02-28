<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FloorPlanController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UnitFeatureController;
use App\Http\Controllers\FloorPlanFeatureController;
use App\Http\Controllers\DeveloperController;
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


Route::middleware('auth:sanctum')->post('developer/project/create', [ProjectController::class, 'createProject']);
Route::middleware('auth:sanctum')->post('developer/floorplan/create', [FloorPlanController::class, 'createFloorPlan']);
Route::middleware('auth:sanctum')->post('developer/floorplan/edit', [FloorPlanController::class, 'editFloorPlan']);
Route::middleware('auth:sanctum')->post('developer/unit/create', [UnitController::class, 'createUnit']);
Route::middleware('auth:sanctum')->post('developer/add-unit-feature', [UnitFeatureController::class, 'createFeature']);
Route::middleware('auth:sanctum')->post('developer/add-floor-plan-feature', [FloorPlanFeatureController::class, 'createFeature']);

Route::middleware('auth:sanctum')->get('developer/project/form-get', [ProjectController::class, 'projectFormGet']);
Route::middleware('auth:sanctum')->get('developer/project/listing', [ProjectController::class, 'projectListing']);
Route::middleware('auth:sanctum')->get('developer/project/{id}', [ProjectController::class, 'projectById']);
Route::middleware('auth:sanctum')->get('developer/floor-plan/create-form-get', [FloorPlanController::class, 'floorPlanCreateGet']);
Route::middleware('auth:sanctum')->get('developer/floor-plan/edit-form-get', [FloorPlanController::class, 'floorPlanEditGet']);
Route::middleware('auth:sanctum')->get('developer/unit-create-get', [UnitController::class, 'unitCreateGet']);
Route::middleware('auth:sanctum')->get('developer/user', [DeveloperController::class, 'userInfo']);