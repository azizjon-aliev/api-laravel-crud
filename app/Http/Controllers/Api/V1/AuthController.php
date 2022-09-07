<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\LoginRequest;
use App\Http\Requests\Api\V1\Auth\RegisterRequest;
use App\Services\Api\V1\Auth\Service;

class AuthController extends Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     *  @OA\Post(
     *      path="/api/v1/login",
     *      summary="Login",
     *      description="Authenticate the request's credentials.",
     *      tags={"Auth"},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Parameters",
     *          @OA\JsonContent(
     *              required={"email","password"},
     *              @OA\Property(property="email", type="string", example="example@gmail.com"),
     *              @OA\Property(property="password", type="string", example="password")
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Login success",
     *          @OA\JsonContent(ref="#/components/schemas/AuthResource")
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation failed"
     *      )
     *  )
     */
    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $response = $this->service->login($data);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     *
     *  @OA\Post(
     *      path="/api/v1/register",
     *      summary="Register",
     *      description="Authenticate the request's credentials.",
     *      tags={"Auth"},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Parameters",
     *          @OA\JsonContent(
     *              required={"name", "email", "password", "confirmation_password"},
     *              @OA\Property(property="name", type="string", example="example name"),
     *              @OA\Property(property="email", type="string", example="example@gmail.com"),
     *              @OA\Property(property="password", type="string", example="password"),
     *              @OA\Property(property="password_confirmation", type="string", example="password")
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Register success",
     *          @OA\JsonContent(ref="#/components/schemas/AuthResource")
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation failed"
     *      )
     *  )
     */
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $response = $this->service->register($data);

        return $response;
    }
}
