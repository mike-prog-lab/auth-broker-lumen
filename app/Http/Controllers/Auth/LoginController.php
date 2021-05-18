<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWT;

/**
 * Class LoginController
 * @package App\Http\Controllers\Auth
 */
final class LoginController extends AuthController
{
    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only(['email', 'password']);

        if ($token = $this->auth->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return $this->json([
            'error' => 'Unauthorized',
        ], 401);
    }
}
