<?php

namespace App\Transformers\Pages;

use App\Models\Pages\Theme;

class ThemeTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(Theme $theme)
    {
        return [
            'id' => $theme->id,
            'parent_id' => $theme->parent_id,
            'name' => $theme->name,
            'slug' => $theme->slug,
        ];
    }
}
