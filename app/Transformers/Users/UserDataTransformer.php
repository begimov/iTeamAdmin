<?php

namespace App\Transformers\Users;

use App\User;

class UserDataTransformer extends \League\Fractal\TransformerAbstract
{
    protected $dataType;

    public function __construct($dataType)
    {
        $this->dataType = $dataType;
    }

    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'value' => $user->{$this->dataType},
        ];
    }
}
