<?php

namespace App\Transformers;

use App\User;
use App\Transformers\Users\UserProfileTransformer;

class UserTransformer extends \League\Fractal\TransformerAbstract
{
    protected $availableIncludes = ['userProfile'];

    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ];
    }

    public function includeUserProfile(User $user)
    {
        return $this->item($user->userProfile, new UserProfileTransformer);
    }
}
