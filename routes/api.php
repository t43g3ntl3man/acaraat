<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FloorPlanController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UnitFeatureController;
use App\Http\Controllers\FloorPlanFeatureController;
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

Route::post('developer/project/create', [ProjectController::class, 'createProject']);
Route::post('developer/floorplan/create', [FloorPlanController::class, 'createFloorPlan']);
Route::post('developer/floorplan/edit', [FloorPlanController::class, 'editFloorPlan']);
Route::post('developer/unit/create', [UnitController::class, 'createUnit']);
Route::post('developer/add-unit-feature', [UnitFeatureController::class, 'createFeature']);
Route::post('developer/add-floor-plan-feature', [FloorPlanFeatureController::class, 'createFeature']);
