<?php

namespace Tests\Unit\Post\Repository;

use App\Models\Post;
use App\Service\PostRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostRepositoryTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase;

    /**
     * @test
     */
    public function getAll()
    {
        Post::factory(10)->create();

        $posts = PostRepository::getAll();

        $this->assertNotNull($posts);
    }

    /**
     * @test
     */
    public function save()
    {
        $data = [
            'title' => 'Test title',
            'description' => 'Test description',
        ];

        $post = PostRepository::save(new Post(), $data);

        $this->assertNotNull($post);

        $this->assertIsBool($data['title'] == $post->title);
    }

    /**
     * @test
     */
    public function deleteData()
    {
        $post = Post::factory(1)->create()->first();

        PostRepository::delete($post);

        $this->assertNull(Post::find($post->id));
    }
}
