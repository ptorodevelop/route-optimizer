<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\{RegisterRequest, LoginRequest};
use App\Models\Constant;
use App\Services\Auth\AuthService;
use App\Services\User\UserService;
use Exception;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    protected User $user;

    protected AuthService $authService;

    public function __construct(AuthService $authService, UserService $userService)
    {
         $this->authService = $authService;
         $this->userService = $userService;
    }

    public function register(RegisterRequest $request)
    {
        try {
           $response = $this->userService->register($request->all());
           return $this->responseJson($response['status'], $response['message'], $response['data']);
        } catch (Exception $ex) {
            return $this->responseJson(false, $ex->getMessage(), [], Constant::HTTP_CODE_INTERNAL_SERVER_ERROR);
        }
    }

     public function login(LoginRequest $request): JsonResponse
    {
        try {
            $response = $this->authService->attemptLogin($request->email, $request->password);
            return $this->responseJson($response['status'], $response['message'], $response['data']);
        } catch (Exception $ex) {
            return $this->responseJson(false, $ex->getMessage(), [], Constant::HTTP_CODE_INTERNAL_SERVER_ERROR);
        }
    }
}
