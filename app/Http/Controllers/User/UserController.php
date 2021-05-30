<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers\User
 */
final class UserController extends Controller
{
    /**
     * @var UserService
     */
    private UserService $service;

    /**
     * UserController constructor.
     * @param UserService $service
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        return $this->json($request->user());
    }

    /**
     * @param int $userId
     * @return JsonResponse
     */
    public function isValidId(int $id): JsonResponse
    {
        return $this->json((bool) $this->service->find($id));
    }
}
