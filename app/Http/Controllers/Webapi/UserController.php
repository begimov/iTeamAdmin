<?php

namespace App\Http\Controllers\Webapi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\UserRepository;

use App\User;

use App\Transformers\UserTransformer;

use App\Repositories\Eloquent\Criteria\{ WhereLike, Take };

class UserController extends Controller
{
    protected $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function getUsersDataByQuery(Request $request, $data)
    {
        $query = $request->input('query');

        $users = $this->users->withCriteria([
            new WhereLike($data, $query),
            new Take(3),
        ])->get();

        return fractal($users, new UserTransformer())->toArray();
    }
}
