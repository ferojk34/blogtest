<?php

namespace Modules\Blog\Repositories;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Modules\Blog\Entities\Blog;
use Intervention\Image\Facades\Image;
use Modules\Core\Repositories\BaseRepository;

class BlogRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Blog();
        $this->rules = [
            "description" => "required",
            "image" => "sometimes|image|mimes:jpeg,jpg,png|max:5120",
        ];
    }

    public function storeBlog(Request $request): object
    {
        try {
            $rules = ["title" => "required|unique:blogs,title"];
            $this->validateData($request, $rules);
            $file = $request->file("image");
            if ($file) {
                $org_image = "image".mt_rand().time() . "." . $file->clientExtension();
                $img = Image::make($org_image);
                $img->save("blogs/{$org_image}");
            }

            $data = [
                "title" => $request->title,
                "slug" => Str::slug($request->title),
                "description" => $request->description,
                "image" => $org_image ?? null,
            ];
            $blog = $this->create($data);
        } catch (Exception $exception) {
            throw $exception;
        }

        return $blog;
    }

    public function updateBlog(
        Request $request,
        int $id
    ): object {
        try {
            $rule = ["title" => "required|unique:blogs,id,{$id}"];
            $this->validateData($request, $rule);
            $file = $request->file("image");
            if ($file) {
                $org_image = "image".mt_rand().time() . "." . $file->clientExtension();
                $img = Image::make($org_image);
                $img->save("blogs/{$org_image}");
            }

            $data = [
                "title" => $request->title,
                "slug" => Str::slug($request->title),
                "description" => $request->description,
                "image" => $org_image ?? null,
            ];
            $blog = $this->update($data, $id);
        } catch (Exception $exception) {
            throw $exception;
        }

        return $blog;
    }
}