<?php

namespace App\Repositories\Eloquent\Pages;

use App\Repositories\EloquentRepositoryAbstract;
use App\Repositories\Contracts\Pages\BlockRepository;
use App\Models\Pages\Block;

class EloquentBlockRepository extends EloquentRepositoryAbstract implements BlockRepository
{
    public function entity()
    {
        return Block::class;
    }
}
