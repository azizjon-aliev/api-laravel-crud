<?php

namespace App\Virtual\Requests\V1;

 /**
 *  @OA\Schema(
 *      schema="CategoryRequest",
 *      title="Category body request",
 *      required={"title"},
 * 	    @OA\Property(property="title", type="string", example="Category example")
 * )
 */
class CategoryRequest {}
