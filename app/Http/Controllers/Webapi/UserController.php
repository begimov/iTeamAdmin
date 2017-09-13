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

    public function getUserDataById(Request $request, $data)
    {
        $id = $request->input('id');

        switch ($data) {
            case 'names':
                return $this->getNamesById($id);
                break;
        }
    }

    public function getUsersDataByQuery(Request $request, $data)
    {
        $query = $request->input('query');

        switch ($data) {
            case 'emails':
                return $this->getEmailsByQuery($query);
                break;

            case 'names':
                return $this->getNamesByQuery($query);
                break;

            case 'phones':
                return $this->getPhonesByQuery($query);
                break;

            case 'companies':
                return $this->getCompaniesByQuery($query);
                break;

            default:
                return response()->json([
                    'error' => "Unknown data type: {$data}"
                ]);
                break;
        }
    }

    protected function getEmailsByQuery($query)
    {
        return fractal($this->users->whereLike('email', $query, 3), new UserDataTransformer('email'))->toArray();
    }

    protected function getNamesByQuery($query)
    {
        return fractal($this->users->whereLike('name', $query, 3), new UserDataTransformer('name'))->toArray();
    }

    protected function getPhonesByQuery($query)
    {
        return fractal($this->userProfiles->whereLike('phone', $query, 3), new UserProfileDataTransformer('phone'))->toArray();
    }

    protected function getCompaniesByQuery($query)
    {
        return fractal($this->companies->whereLike('name', $query, 3), new CompanyTransformer('name'))->toArray();
    }
}
