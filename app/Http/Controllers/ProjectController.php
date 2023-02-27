<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DeveloperRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    private DeveloperRepository $developerRepository;
    public function __construct(DeveloperRepository $developerRepository) 
    {
        $this->developerRepository = $developerRepository;
    }

    public function createProject(Request $request){
        $response = $this->developerRepository->createProject($request);
        return response()->json([
            'status' => $response['status'],
            "msg" => $response['msg'],
            "data" => null
        ]);
    }
    
    public function projectFormGet(){
        $response = $this->developerRepository->projectFormGet();
        return response()->json([
            'status' => $response['status'],
            "msg" => $response['msg'],
            "data" => $response['data']
        ]);
    }

    public function projectListing(){
        $response = $this->developerRepository->projectListing();
        return response()->json([
            'status' => $response['status'],
            "msg" => $response['msg'],
            "data" => $response['data']
        ]);
    }

    public function projectById($id){
        $response = $this->developerRepository->projectById();
        return response()->json([
            'status' => $response['status'],
            "msg" => $response['msg'],
            "data" => $response['data']
        ]);
    }
}
