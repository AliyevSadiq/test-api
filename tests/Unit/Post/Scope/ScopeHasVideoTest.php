<?php

namespace Tests\Unit\Post\Scope;

use App\Models\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScopeHasVideoTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase;

    /**
     * @test
     */
    public function hasVideo()
    {
        $post = Post::factory(1)->create()->first();

        $resPost = Post::hasVideo()->first();

        $this->assertNotNull($resPost);

        $this->assertTrue($post->id === $resPost->id);
    }

    /**
     * @test
     */
    public function hastNotVideo()
    {
        $post=Post::factory(1)->create([
            'video_url'=>null
        ])->first();

        $resPost = Post::hasNotVideo()->first();

        $this->assertNotNull($post);

        $this->assertNotNull($resPost);

        $this->assertNull($resPost->video_url);
    }

}
