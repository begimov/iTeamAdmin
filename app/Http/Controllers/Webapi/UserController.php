<?php

namespace App\Http\Controllers\Webapi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepository;

use App\User;

use App\Transformers\Users\UserDataTransformer;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function getUserData($data)
    {
        switch ($data) {
            case 'emails':
                return $this->getEmails();
                break;

            case 'names':
                return $this->getNames();
                break;

            default:
                return response()->json([
                    'error' => "Unknown data type: {$data}"
                ]);
                break;
        }
    }

    public function getEmails()
    {
        return fractal(User::all(), new UserDataTransformer('email'))->toArray();
    }

    public function getNames()
    {
        return fractal(User::all(), new UserDataTransformer('name'))->toArray();
    }
}
