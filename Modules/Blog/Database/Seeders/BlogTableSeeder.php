<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Blog\Entities\Blog;
use Illuminate\Support\Facades\DB;

class BlogTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table("blogs")->insert([
            [
                "title" => "blog1",
                "description" => "lorem lorem",
                "slug" => "blog1",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title" => "blog2",
                "description" => "lorem lorem",
                "slug" => "blog2",
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}
