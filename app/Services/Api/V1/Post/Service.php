<?php

namespace App\Services\Api\V1\Post;

use App\Http\Resources\Api\V1\PostResource;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class Service
{
    public function index()
    {
        return PostResource::collection(Post::all());
    }

    public function show($post)
    {
        $post = Post::findOrFail($post);

        return new PostResource($post);
    }

    public function store($data)
    {
        try
        {
            DB::beginTransaction();

            $category = Category::firstOrCreate(['title' => $data['category']['title']]);

            $post = Post::create([
                'title' => $data['title'],
                'content' => $data['content'],
                'category_id' => $category->id,
            ]);

            DB::commit();

            return new PostResource($post);

        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json([
                'message' => 'Server Error',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function update($post, $data)
    {
        $post = Post::findOrFail($post);

        try
        {
            DB::beginTransaction();

            if (isset($data['category']['id']))
            {
                $category = Category::find($data['category']['id']);
                $category->update(['title' => $data['category']]);
            }
            else
            {
                $category = Category::firstOrCreate(['title' => $data['category']['title']]);
            }


            $post->update([
                'title' => $data['title'],
                'content' => $data['content'],
                'category_id' => $category->id,
            ]);

            DB::commit();

            return new PostResource($post);
        }
        catch (\Throwable $th)
        {
            DB::rollBack();

            return response()->json([
                'message' => 'Server Error',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function destroy($post)
    {
        $post = Post::findOrFail($post);
        $post->delete();

        return response(null, 204);
    }
}

