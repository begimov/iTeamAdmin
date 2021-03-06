<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
    public function resourceType()
    {
        return $this->belongsTo(ResourceType::class);
    }

    public function isYoutubeVideo()
    {
        return $this->resourceType->id === config('resources.youtubevideo_type_id');
    }

    public function resourceable()
    {
        return $this->morphTo();
    }
}
