<?php

namespace App\Transformers\Users;

use App\Models\Users\UserProfile;
use App\Transformers\Users\ProfileTransformer;

class UserProfileTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(UserProfile $userProfile)
    {
        return [
            'id' => $userProfile->id,
            'user_id' => $userProfile->user_id,
            'phone' => $userProfile->phone,
        ];
    }
}
