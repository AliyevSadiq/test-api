<?php

namespace Tests\Unit\Post\Scope;

use App\Models\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScopeIsPublishedTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase;

    /**
     * @test
     */
    public function isPublished()
    {
        $post=Post::factory(1)->create()->first();

        $resPost=Post::IsPublished()->first();

        $this->assertNotNull($resPost);

        $this->assertIsBool($post->id===$resPost->id);
    }
}
