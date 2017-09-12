<?php

namespace App\Http\Controllers\Webapi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

use App\Transformers\Users\UserEmailTransformer;

class UserController extends Controller
{
    public function getUserData($data)
    {
        switch ($data) {
            case 'emails':
                return $this->getEmails();
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
        return fractal(User::all(), new UserEmailTransformer)->toArray();
    }
}
