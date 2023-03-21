<?php

namespace Modules\Blog\Database\factories;

use Modules\Blog\Entities\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    protected $model = Blog::class;

    public function definition(): array
    {
        return [
            [
                "name" => "blog1",
                "description" => "lorem lorem",
                "slug" => "blog1",
            ],
            [
                "name" => "blog2",
                "description" => "lorem lorem",
                "slug" => "blog2",
            ],
        ];
    }
}

