<?php

namespace App\Http\Controllers\Webapi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\Contracts\Users\UserProfileRepository;

use App\User;

use App\Transformers\Users\UserDataTransformer;
use App\Transformers\Users\UserProfileDataTransformer;

class UserController extends Controller
{
    protected $user;
    protected $userProfiles;

    public function __construct(UserRepository $users,
        UserProfileRepository $userProfiles)
    {
        $this->users = $users;
        $this->userProfiles = $userProfiles;
    }

    public function getUserData(Request $request, $data)
    {
        $query = $request->input('query');

        switch ($data) {
            case 'emails':
                return $this->getEmails($query);
                break;

            case 'names':
                return $this->getNames($query);
                break;

            case 'phones':
                return $this->getPhones($query);
                break;

            default:
                return response()->json([
                    'error' => "Unknown data type: {$data}"
                ]);
                break;
        }
    }

    public function getEmails($query)
    {
        return fractal($this->users->whereLike('email', $query), new UserDataTransformer('email'))->toArray();
    }

    public function getNames($query)
    {
        return fractal($this->users->whereLike('name', $query), new UserDataTransformer('name'))->toArray();
    }

    public function getPhones($query)
    {
        return fractal($this->userProfiles->whereLike('phone', $query), new UserProfileDataTransformer('phone'))->toArray();
    }
}
