<?php

namespace Modules\Blog\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            "title" => $request->title,
            "description" => $request->description,
            "image" => $request->image,
        ];
    }
}
