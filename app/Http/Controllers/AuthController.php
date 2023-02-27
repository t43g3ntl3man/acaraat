<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DeveloperRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    private DeveloperRepository $developerRepository;
    public function __construct(DeveloperRepository $developerRepository) 
    {
        $this->developerRepository = $developerRepository;
    }
    public function login(Request $request){
        $response = $this->developerRepository->login($request);
        return response()->json([
            'status' => $response['status'],
            "msg" => $response['msg'],
            "data" => $response['data']
        ]);
    }

    public function register(Request $request){
        $response = $this->developerRepository->register($request);
        return response()->json([
            'status' => $response['status'],
            "msg" => $response['msg'],
            "data" => $response['data']
        ]);
    }
}
