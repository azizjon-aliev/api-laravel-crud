<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

 /**
  * @OA\Info(
  *     version="1.0",
  *     title="Laravel api",
  *     description="Example for laravel api"
  *  )
  * @OA\SecurityScheme(
  *     securityScheme="bearerAuth",
  *     type="http",
  *     scheme="bearer",
  *     in="header"
  * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
