<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Database\Seeders\BlogTableSeeder;

class BlogDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Model::unguard();
        $this->call(BlogTableSeeder::class);
    }
}
