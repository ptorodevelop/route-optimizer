<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Constant;
use Facades\App\Services\Route\RouteService;
use Exception;
use Illuminate\Http\JsonResponse;

class RouteController extends Controller
{
    public function optimize(Request $request) : JsonResponse
    {
        try {
            $response = RouteRouteService::optimizeRoute($request->all());
            return $this->responseJson($response['status'], $response['message'], $response['data']);
        } catch (Exception $ex) {
            return $this->responseJson(false, $ex->getMessage(), [], Constant::HTTP_CODE_INTERNAL_SERVER_ERROR);
        }
    }
}
