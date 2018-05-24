<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;

use App\Filters\Pages\PageFilters;

use App\Models\Products\Category;

class Page extends Model
{
    protected $fillable = ['name', 'description', 'category_id', 'status'];
    
    public function elements()
    {
        return $this->hasMany(Element::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter($builder, $repository, $request, array $filters = [])
    {
        return (new PageFilters($request))->add($filters)->filter($repository);
    }
}
