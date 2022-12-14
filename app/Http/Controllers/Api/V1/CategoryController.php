<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Category\StoreRequest;
use App\Http\Requests\Api\V1\Category\UpdateRequest;
use App\Services\Api\V1\Category\Service;

class CategoryController extends Controller
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
     *      path="/api/v1/category",
     *      summary="Get all categories",
     *      description="Get all categories",
     *      security={{"bearerAuth":{}}},
     *      tags={"Category"},
     *      @OA\Response(
     *          response=200,
     *          description="Get categories success",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/CategoryResource")
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
     *      path="/api/v1/category",
     *      summary="Create category",
     *      description="Create category.",
     *      tags={"Category"},
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Parameters",
     *          @OA\JsonContent(ref="#/components/schemas/CategoryRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Create category success",
     *          @OA\JsonContent(ref="#/components/schemas/CategoryResource")
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
        $res = $this->service->store($data);

        return $res;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     *
     *  @OA\Get(
     *      path="/api/v1/category/{id}",
     *      summary="Get category",
     *      description="Get category",
     *      security={{"bearerAuth":{}}},
     *      tags={"Category"},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Get category success",
     *          @OA\JsonContent(ref="#/components/schemas/CategoryResource")
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Category does not exist"
     *      )
     *  )
     */
    public function show($id)
    {
        return $this->service->show($id);
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
     *      path="/api/v1/category/{id}",
     *      summary="Update category",
     *      description="Update category by id",
     *      tags={"Category"},
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
     *          @OA\JsonContent(ref="#/components/schemas/CategoryRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Update category success",
     *          @OA\JsonContent(ref="#/components/schemas/CategoryResource")
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Category does not exist"
     *      )
     *  )
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        $res = $this->service->update($data, $id);

        return $res;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     *
     *  @OA\Delete(
     *      path="/api/v1/category/{id}",
     *      summary="Delete category",
     *      description="Delete category.",
     *      tags={"Category"},
     *      security={{"bearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Delete category success",
     *          @OA\MediaType(mediaType="application/json")
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Category does not exist",
     *      )
     *  )
     */
    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
