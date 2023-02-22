<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DeveloperRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class FloorPlanFeatureController extends Controller
{
    public function __construct(DeveloperRepository $developerRepository) 
    {
        $this->developerRepository = $developerRepository;
    }
    public function createFeature(Request $request){
        $response = $this->developerRepository->createFloorPlanFeature($request);
        return response()->json([
            'status' => $response['status'],
            "msg" => $response['msg'],
            "data" => null
        ]);
    }
}
