<?php

namespace App\Virtual\Resources\V1;

/**
 *  @OA\Schema(
 *      schema="CategoryResource",
 *      title="Category json response",
 * 	    @OA\Property(property="id", type="integer"),
 *      @OA\Property(property="title", type="string"),
 *      @OA\Property(property="created_at", type="string", format="date-time"),
 *      @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */
class CategoryResource {}
