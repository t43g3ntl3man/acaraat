<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DeveloperRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class FloorPlanController extends Controller
{
    private DeveloperRepository $developerRepository;
    public function __construct(DeveloperRepository $developerRepository) 
    {
        $this->developerRepository = $developerRepository;
    }
    public function createFloorPlan(Request $request){
        $response = $this->developerRepository->createFloorPlan($request);
        return response()->json([
            'status' => $response['status'],
            "msg" => $response['msg'],
            "data" => null
        ]);
    }
    
    public function editFloorPlan(Request $request){
        $response = $this->developerRepository->editFloorPlan($request);
        return response()->json([
            'status' => $response['status'],
            "msg" => $response['msg'],
            "data" => null
        ]);
    }
}
