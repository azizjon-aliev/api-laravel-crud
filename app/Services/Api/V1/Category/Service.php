<?php

namespace App\Services\Api\V1\Category;

use App\Http\Resources\Api\V1\CategoryResource;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class Service
{
    public function index()
    {
        $cats = Category::all();
        return CategoryResource::collection($cats);
    }

    public function show($cat)
    {
        $cat = Category::findOrFail($cat);
        return new CategoryResource($cat);
    }

    public function store($data)
    {
        try {

            DB::beginTransaction();

            $cat = Category::fistOrCreate(['title' => $data['title']]);

            DB::commit();

            return new CategoryResource($cat);

        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json([
                'message' => 'Server Error',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function update($data, $cat)
    {
        $cat = Category::findOrFail($cat);

        try {
            DB::beginTransaction();

            $cat->update(['title' => $data['title']]);

            DB::commit();

            return new CategoryResource($cat);

        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json([
                'message' => 'Server Error',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function destroy($cat)
    {
        $cat = Category::findOrFail($cat);

        try {
            DB::beginTransaction();

            $cat->posts->delete();
            $cat->delete();

            DB::commit();

            return response(null, 204);

        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json([
                'message' => 'Server Error',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}

