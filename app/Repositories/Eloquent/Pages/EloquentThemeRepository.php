<?php

namespace App\Repositories\Eloquent\Pages;

use App\Repositories\EloquentRepositoryAbstract;
use App\Repositories\Contracts\Pages\ThemeRepository;

use App\Models\Pages\Theme;

class EloquentThemeRepository extends EloquentRepositoryAbstract implements ThemeRepository
{
    public function entity()
    {
        return Theme::class;
    }
}
