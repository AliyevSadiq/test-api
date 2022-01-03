<?php

namespace App\Virtual;

/**
 * @OA\Schema(
 *     title="Post Store",
 *     description="Post model",
 *     @OA\Xml(
 *         name="Post Store"
 *     )
 * )
 */
class PostStore
{
    /**
     * @OA\Property(
     *      title="Post title",
     *      description="Post title",
     *      type="string",
     *      example="Post title"
     * )
     */
    public string $title;

    /**
     * @OA\Property(
     *      title="Post description",
     *      description="Post description",
     *      type="string",
     *      example="Post description"
     * )
     */
    public string $description;
}
