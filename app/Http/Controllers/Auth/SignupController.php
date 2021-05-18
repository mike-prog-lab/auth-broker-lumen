<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignupRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\JWT;
use Tymon\JWTAuth\JWTAuth;

/**
 * Class SignupController
 * @package App\Http\Controllers\Auth
 */
final class SignupController extends AuthController
{
    /**
     * @var UserService
     */
    protected UserService $service;

    /**
     * SignupController constructor.
     * @param UserService $service
     * @param JWTAuth $auth
     */
    public function __construct(UserService $service, JWTAuth $auth)
    {
        $this->service = $service;

        parent::__construct($auth);
    }

    /**
     * @param SignupRequest $request
     * @return JsonResponse
     */
    public function signup(SignupRequest $request): JsonResponse
    {
        $data = $request->only(['name', 'email', 'password']);

        $user = $this->service->create($data);

        return $this->respondWithToken($this->auth->fromUser($user));
    }
}
