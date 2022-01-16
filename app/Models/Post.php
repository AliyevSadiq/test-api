<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App\Models
 * @property string title
 * @property string description
 * @property string video_url
 */
class Post extends Model
{
    use HasFactory;

    protected static function newFactory(): PostFactory
    {
        return PostFactory::new();
    }

    protected $guarded = [];


    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getVideoUrl(): string
    {
        return $this->video_url;
    }

    /**
     * @param ?string $video_url
     */
    public function setVideoUrl(?string $video_url = null): self
    {
        $this->video_url = $video_url;
        return $this;
    }


    public function getTitleAttribute($value): string
    {
        return ucfirst($value);
    }

    public function getDescriptionAttribute($value): string
    {
        return ucfirst($value);
    }

    public function getCreatedAtAttribute($value): string
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getPublishedAtAttribute($value): string
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = strip_tags($value);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeIsPublished(Builder $query): Builder
    {
        return $query->whereNotNull('published_at')
            ->where('published_at', '>', $this->created_at);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeHasVideo(Builder $query, bool $has = true): Builder
    {
        if ($has) {
            return $query->whereNotNull('video_url');
        } else {
            return $query->whereNull('video_url');
        }
    }

    public function scopeHasNotVideo($query)
    {
        return $query->hasVideo(false);
    }
}
