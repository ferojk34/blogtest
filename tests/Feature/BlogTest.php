<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\Response;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateBlogPost(): void
    {
        $blogData = [
                "title" => "blog1",
                "description" => "lorem lorem",
                "slug" => "blog1",
                "created_at" => now(),
                "updated_at" => now(),
        ];

        $response = $this->post($this->getRoute("blog.store"), $blogData);
        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJsonFragment([
            "status" => "success",
            "message" => "create-success",
        ]);
    }

    private function getRoute(string $method, ?array $parameters = null): string
    {
        return route("{$method}", $parameters);
    }
}
