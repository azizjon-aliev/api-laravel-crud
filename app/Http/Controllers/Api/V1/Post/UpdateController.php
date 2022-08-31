<?php

namespace App\Http\Controllers\Api\V1\Post;

use App\Http\Requests\Api\V1\Post\UpdateRequest;

class UpdateController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request, $post)
    {
        $data = $request->validated();
        $res = $this->service->update($post, $data);

        return $res;
    }
}
