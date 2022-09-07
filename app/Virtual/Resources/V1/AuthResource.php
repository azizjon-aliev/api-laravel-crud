<?php

namespace App\Virtual\Resources\V1;

/**
 *  @OA\Schema(
 *      schema="AuthResource",
 *      title="Auth json response",
 * 	    @OA\Property(property="username", type="string"),
 *      @OA\Property(property="token_type", type="string"),
 *      @OA\Property(property="token", type="string"),
 *      @OA\Property(property="expires_at", type="date")
 * )
 */
class AuthResource {}

