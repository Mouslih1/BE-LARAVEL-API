<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\User\LoginUserRequest;
use App\Http\Requests\User\CreateUserRequest;

class RegisterController extends BaseController
{
    public UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(CreateUserRequest $createUserRequest)
    {
        if(!empty($createUserRequest->getErrors()))
        {
            return response()->json($createUserRequest->getErrors(), 406);
        }

        $user = $this->userService->createUser($createUserRequest->request()->all());
        $message['user'] = $user;
        $message['token'] = $user->createToken('MyApp')->plainTextToken;

        return $this->sendResponse($message);
    }

    public function login(LoginUserRequest $loginUserRequest)
    {
        if(!empty($loginUserRequest->getErrors()))
        {
            return response()->json($loginUserRequest->getErrors(), 406);
        }

        $request = $loginUserRequest->request();
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;

            return $this->sendResponse($success);
        }else{
            return $this->sendResponse('Unautorised', 'fail', 401);
        }
    }
}
