<?php

namespace App\Http\Controllers\Api\V1\Post;

use App\Http\Requests\Api\V1\Post\StoreRequest;

class StoreController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $res = $this->service->store($data);

        return $res;
    }
}
