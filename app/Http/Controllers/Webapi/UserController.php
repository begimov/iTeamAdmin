<?php

namespace App\Http\Controllers\Webapi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\UserRepository;
use App\Repositories\Contracts\Users\UserProfileRepository;
use App\Repositories\Contracts\Users\CompanyRepository;

use App\User;

use App\Transformers\Users\UserDataTransformer;
use App\Transformers\Users\UserProfileDataTransformer;
use App\Transformers\Users\CompanyTransformer;

class UserController extends Controller
{
    protected $user;
    protected $userProfiles;
    protected $companies;

    public function __construct(UserRepository $users,
        UserProfileRepository $userProfiles,
        CompanyRepository $companies)
    {
        $this->users = $users;
        $this->userProfiles = $userProfiles;
        $this->companies = $companies;
    }

    public function getUserData(Request $request, User $user, $data)
    {
        switch ($data) {
            case 'name':
                return $this->transformNames($user);
                break;

            default:
                return response()->json([
                    'error' => "Unknown data type: {$data}"
                ]);
                break;
        }
    }

    public function getUsersDataByQuery(Request $request, $data)
    {
        $query = $request->input('query');

        switch ($data) {
            case 'email':
                return $this->transformEmails($this->users->whereLike($data, $query, 3));
                break;

            case 'name':
                return $this->transformNames($this->users->whereLike($data, $query, 3));
                break;

            case 'phone':
                return $this->transformPhones($this->userProfiles->whereLike($data, $query, 3));
                break;

            case 'company':
                return $this->transformCompanies($this->companies->whereLike('name', $query, 3));
                break;

            default:
                return response()->json([
                    'error' => "Unknown data type: {$data}"
                ]);
                break;
        }
    }

    protected function transformEmails($data)
    {
        return fractal($data, new UserDataTransformer('email'))->toArray();
    }

    protected function transformNames($data)
    {
        return fractal($data, new UserDataTransformer('name'))->toArray();
    }

    protected function transformPhones($data)
    {
        return fractal($data, new UserProfileDataTransformer('phone'))->toArray();
    }

    protected function transformCompanies($data)
    {
        return fractal($data, new CompanyTransformer('name'))->toArray();
    }
}
