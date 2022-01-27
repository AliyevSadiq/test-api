<?php

namespace Tests\Feature\Post\Controllers\Api;

use App\Models\Post;
use Illuminate\Foundation\Testing\{DatabaseMigrations, RefreshDatabase, WithFaker};
use Illuminate\Http\Response;
use Tests\TestCase;

class PostControllerTest extends TestCase
{

    use DatabaseMigrations, RefreshDatabase,WithFaker;

    /**
     * @test
     */
    public function posts_can_lists()
    {
        $response = $this->get(route('posts.index'));

        $response->assertStatus(200);

        $this->assertNotEmpty($response->getContent());
    }

    /**
     * @test
     */
    public function post_can_create()
    {
        $data=$this->simulateData();

        $response=$this->post(route("posts.store"),$data);

        $response->assertStatus(Response::HTTP_CREATED);

        $this->assertSame(Post::find(1)->title,$data['title']);
    }

    /**
     * @test
     */
    public function post_can_update()
    {
        $post=Post::factory(1)->create()->first();

        $data=$this->simulateData();

        $response= $this->put(route("posts.update",$post->id),$data);

        $response->assertStatus(Response::HTTP_ACCEPTED);

        $this->assertNotSame($data['description'],$post->descritpion);
    }

    /**
     * @test
     */
    public function post_can_delete()
    {
        $post=Post::factory(1)->create()->first();

        $response=$this->delete(route('posts.destroy',$post->id));

        $response->assertStatus(Response::HTTP_NO_CONTENT);

        $this->assertEmpty($response->getContent());
    }

    private function simulateData(): array
    {
        return [
            'title'=>$this->faker->title,
            'description'=>$this->faker->text(100),
            'video_url'=>$this->faker->url
        ];
    }
}
