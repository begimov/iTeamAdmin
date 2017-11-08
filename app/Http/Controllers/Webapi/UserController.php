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

use App\Repositories\Eloquent\Criteria\WhereLike;

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
                return $this->transformEmailsOrNames($user, $data);
                break;

            case 'phone':
                return $this->transformPhones($user->userProfile);
                break;

            case 'company':
                return $this->transformCompanies($user->userProfile->company);
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
                return $this->transformEmailsOrNames(
                    $this->users->withCriteria([
                        new WhereLike($data, $query)
                    ])->take(3)->get(), $data);
                // return $this->transformEmailsOrNames(
                //     $this->users->whereLike($data, $query, 3), $data);
                break;

            case 'name':
                return $this->transformEmailsOrNames(
                    $this->users->whereLike($data, $query, 3), $data);
                break;

            case 'phone':
                return $this->transformPhones(
                    $this->userProfiles->whereLike($data, $query, 3));
                break;

            case 'company':
                return $this->transformCompanies(
                    $this->companies->whereLike('name', $query, 3));
                break;

            default:
                return response()->json([
                    'error' => "Unknown data type: {$data}"
                ]);
                break;
        }
    }

    protected function transformEmailsOrNames($data, $type)
    {
        return fractal($data, new UserDataTransformer($type))->toArray();
    }

    protected function transformPhones($data)
    {
        return fractal($data, new UserProfileDataTransformer('phone'))->toArray();
    }

    protected function transformCompanies($data)
    {
        return fractal($data, new CompanyTransformer())->toArray();
    }
}
