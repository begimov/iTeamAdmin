<?php

namespace App\Models\Reviews;

use App\Models\Content\File;
use App\Filters\Reviews\ReviewFilters;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['author', 'position', 'quote'];

    public function files()
    {
        return $this->hasMany(File::class);
    }
    
    public function scopeFilter($builder, $repository, $request, array $filters = [])
    {
        return (new ReviewFilters($request))->add($filters)->filter($repository);
    }
}
