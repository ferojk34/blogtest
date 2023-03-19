<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up() :void
    {
        Schema::create("blogs", function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->unique("slug");
            $table->longText("description");
            $table->string("image")->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("blogs");
    }
};
