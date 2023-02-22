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
}
