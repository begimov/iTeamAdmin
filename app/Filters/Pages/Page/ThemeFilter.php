<?php

namespace App\Filters\Pages\Page;

use App\Filters\FilterAbstract;

use App\Repositories\Eloquent\Criteria\OrWhere;

class ThemeFilter extends FilterAbstract
{
    public function filter($repository, $themes)
    {
        foreach ($themes as $themeId) {
            $repository->withCriteria([
                new OrWhere('theme_id', $this->resolveFilterValue($themeId))
            ]);
        }
        return $repository;
    } 
}
