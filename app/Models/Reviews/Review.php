<?php

namespace App\Models\Reviews;

use App\Filters\Reviews\ReviewFilters;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['author', 'position', 'quote'];
    
    public function scopeFilter($builder, $repository, $request, array $filters = [])
    {
        return (new ReviewFilters($request))->add($filters)->filter($repository);
    }
}
