<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Requests\{StorePostRequest, UpdatePostRequest};
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Service\InterfaceRepository;
use Illuminate\Http\{JsonResponse, Response};
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PostController extends ApiController
{

    private InterfaceRepository $repository;

    public function __construct(InterfaceRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @OA\Get(
     *      path="/api/posts",
     *       tags={"Post"},
     *      summary="Get list of posts",
     *      description="Returns list of posts",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *     )
     */
    public function index(): AnonymousResourceCollection
    {
        return PostResource::collection($this->repository->getAll());
    }

    /**
     * @OA\Post(
     *      path="/api/posts",
     *       tags={"Post"},
     *      summary="Store new post",
     *      description="Returns post data",
     *      @OA\RequestBody(
     *          required=true,
     *     @OA\JsonContent(ref="#/components/schemas/PostStore")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *     )
     */
    public function store(StorePostRequest $request)
    {
        $data = $this->repository->save(new Post(), $request->validated());
        return (new PostResource($data))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *      path="/api/posts/{id}",
     *     tags={"Post"},
     *      summary="Get post information",
     *      description="Returns post data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Post data",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       )
     * )
     */
    public function show(Post $post): PostResource
    {
        return new PostResource($post);
    }

    /**
     * @OA\Put(
     *      tags={"Post"},
     *      path="/api/posts/{id}",
     *      summary="Update existing post",
     *      description="Returns updated post data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Post data",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *     @OA\JsonContent(ref="#/components/schemas/PostStore")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       )
     * )
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $this->repository->save($post, $request->validated());
        return (new PostResource($data))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    /**
     * @OA\Delete(
     *      tags={"Post"},
     *      path="/api/posts/{id}",
     *      summary="Delete existing post",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Deleting post data",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       )
     * )
     */
    public function destroy(Post $post): JsonResponse
    {
        $this->repository->delete($post);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
