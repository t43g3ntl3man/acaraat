<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DeveloperRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class DeveloperController extends Controller
{
    private DeveloperRepository $developerRepository;
    public function __construct(DeveloperRepository $developerRepository) 
    {
        $this->developerRepository = $developerRepository;
    }
    
    public function userInfo(){
        $response = $this->developerRepository->userInfo();
        return response()->json([
            'status' => $response['status'],
            "msg" => $response['msg'],
            "data" => $response['data']
        ]);
    }
}
