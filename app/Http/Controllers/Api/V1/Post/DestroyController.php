<?php

namespace App\Http\Controllers\Api\V1\Post;

class DestroyController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($post)
    {
        return $this->service->destroy($post);
    }
}
