<?php

namespace App\Transformers\Users;

use App\User;

class UserEmailTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'value' => $user->email,
        ];
    }
}
