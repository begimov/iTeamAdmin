<?php

namespace App\Transformers\Users;

use App\Models\Users\UserProfile;

class UserProfileDataTransformer extends \League\Fractal\TransformerAbstract
{
    protected $dataType;

    public function __construct($dataType)
    {
        $this->dataType = $dataType;
    }

    public function transform(UserProfile $userProfile)
    {
        return [
            'id' => $userProfile->id,
            'value' => $userProfile->{$this->dataType},
        ];
    }
}
