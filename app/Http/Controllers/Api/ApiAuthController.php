<?php

namespace App\Http\Controllers\Api;

use App\DTO\Auth\AuthData;
use App\Exceptions\AuthException;
use App\Exceptions\BanException;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\AuthResource;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class ApiAuthController extends Controller
{
    public function __construct(
        public readonly AuthService $authService
    )
    {}


    /**
     * @param LoginRequest $request
     * @throws AuthException|BanException
     * @return string[]
     */
    public function customLogin(LoginRequest $request): array
    {
        $data = AuthData::create($request);
        $user = $this->authService->findUser($data);

        if (!$user) {
            throw new AuthException();
        }

        if($user->is_banned) {
            throw new BanException();
        }

        Auth::login($user);
        $token = $user->createToken($user->name);

        return ['token' => $token->plainTextToken];
    }

    /**
     * @param RegistrationRequest $request
     * @return AuthResource
     */
    public function customRegistration(RegistrationRequest $request): AuthResource
    {
        $data = AuthData::create($request);
        $user = $this->authService->registrationUser($data);

        return AuthResource::make($user);
    }

    /**
     * @return void
     */
    public function logout(): void
    {
        /** @var User $user */
        $user = Auth::user();
        /** @var PersonalAccessToken $token */
        $token = $user->currentAccessToken();
        $token->delete();
    }
}
