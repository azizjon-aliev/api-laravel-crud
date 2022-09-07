<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Post\StoreRequest;
use App\Http\Requests\Api\V1\Post\UpdateRequest;
use App\Services\Api\V1\Post\Service;

class PostController extends Controller
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
     *  @OA\Get(
     *      path="/api/v1/post",
     *      summary="Get all posts",
     *      description="Get all posts",
     *      security={{"bearerAuth":{}}},
     *      tags={"Post"},
     *      @OA\Response(
     *          response=200,
     *          description="Get posts success",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/PostResource")
     *              )
     *          )
     *      )
     *  )
     */
    public function index()
    {
        return $this->service->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     *
     *  @OA\Post(
     *      path="/api/v1/post",
     *      summary="Create post",
     *      description="Create post.",
     *      tags={"Post"},
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Parameters",
     *          @OA\JsonContent(ref="#/components/schemas/PostRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Create post success",
     *          @OA\JsonContent(ref="#/components/schemas/PostResource")
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation failed"
     *      )
     *  )
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        return $this->service->store($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     *
     *  @OA\Get(
     *      path="/api/v1/post/{id}",
     *      summary="Get post",
     *      description="Get post",
     *      security={{"bearerAuth":{}}},
     *      tags={"Post"},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Get post success",
     *          @OA\JsonContent(ref="#/components/schemas/PostResource")
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Post does not exist"
     *      )
     *  )
     */
    public function show($post)
    {
        return $this->service->show($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     *
     *  @OA\Put(
     *      path="/api/v1/post/{id}",
     *      summary="Update post",
     *      description="Update post by id",
     *      tags={"Post"},
     *      security={{"bearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Parameters",
     *          @OA\JsonContent(ref="#/components/schemas/PostRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Update post success",
     *          @OA\JsonContent(ref="#/components/schemas/PostResource")
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Post does not exist"
     *      )
     *  )
     */
    public function update(UpdateRequest $request, $post)
    {
        $data = $request->validated();
        return $this->service->update($post, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     *
     *  @OA\Delete(
     *      path="/api/v1/post/{id}",
     *      summary="Delete post",
     *      description="Delete post.",
     *      tags={"Post"},
     *      security={{"bearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Delete post success",
     *          @OA\MediaType(mediaType="application/json")
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Post does not exist"
     *      )
     *  )
     */
    public function destroy($post)
    {
        return $this->service->destroy($post);
    }
}
