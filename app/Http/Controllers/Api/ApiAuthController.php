<?php

namespace App\Http\Controllers\Api;

use App\DTO\Auth\AuthData;
use App\Exceptions\AuthException;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\AuthResource;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;

class ApiAuthController extends Controller
{
    public function __construct(
        public readonly AuthService $authService
    )
    {}


    /**
     * @param LoginRequest $request
     * @return array
     *@throws NotFoundException
     */
    public function customLogin(LoginRequest $request)
    {
        $data = AuthData::create($request);
        $user = $this->authService->findUser($data);

        if(!$user) {
            throw new NotFoundException();
        }

        Auth::login($user);
        $token = $user->createToken($request->name);

        return ['token' => $token->plainTextToken];
    }

    /**
     * @param RegistrationRequest $request
     * @throws NotFoundException
     * @return void
     */
    public function customRegistration(RegistrationRequest $request)
    {
        $data = AuthData::create($request);
        $user = $this->authService->registrationUser($data);

        //Auth::login($user);
        return AuthResource::make($user);
    }


    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return 0;
    }
}
