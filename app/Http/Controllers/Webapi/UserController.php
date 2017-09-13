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

    public function getUserData(Request $request, $data)
    {
        $query = $request->input('query');

        switch ($data) {
            case 'names':
                return $this->getNames($query);
                break;

            case 'phones':
                return $this->getPhones($query);
                break;

            case 'companies':
                return $this->getCompanies($query);
                break;

            default:
                return response()->json([
                    'error' => "Unknown data type: {$data}"
                ]);
                break;
        }
    }

    public function getNames($query)
    {
        return fractal($this->users->whereLike('name', $query), new UserDataTransformer('name'))->toArray();
    }

    public function getPhones($query)
    {
        return fractal($this->userProfiles->whereLike('phone', $query), new UserProfileDataTransformer('phone'))->toArray();
    }

    public function getCompanies($query)
    {
        return fractal($this->companies->whereLike('name', $query), new CompanyTransformer('name'))->toArray();
    }
}
