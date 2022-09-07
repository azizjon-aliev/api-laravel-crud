<?php

namespace App\Virtual\Resources\V1;

/**
 *  @OA\Schema(
 *      schema="PostResource",
 *      title="Post json response",
 * 	    @OA\Property(property="id", type="integer"),
 *      @OA\Property(property="title", type="string"),
 *      @OA\Property(property="content", type="string"),
 *      @OA\Property(property="category", type="object", ref="#/components/schemas/CategoryResource"),
 *      @OA\Property(property="created_at", type="string", format="date-time"),
 *      @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */
class PostResource {}
