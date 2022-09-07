<?php

namespace App\Virtual\Requests\V1;

/**
 *  @OA\Schema(
 *      schema="PostRequest",
 *      title="Post body request",
 *      required={"title", "content", "category"},
 * 	    @OA\Property(property="title", type="string", example="Post example"),
 *      @OA\Property(property="content", type="string", example="Hello content"),
 *      @OA\Property(property="category", type="object", ref="#/components/schemas/CategoryRequest")
 * )
 */

 class PostRequest {}
