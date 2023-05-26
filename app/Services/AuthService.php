<?php

namespace App\Services;

use App\DTO\Auth\AuthData;
use App\Models\User;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use App\Services\interfaces\AuthServiceInterface;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthServiceInterface
{
    public function __construct(
        public readonly AuthRepositoryInterface $authRepository
    )
    {}

    /**
     * @inheritDoc
     */
    public function registrationUser(AuthData $data): User
    {
        return $this->authRepository->create([
            'name' => $data->name,
            'password' => Hash::make($data->password)
        ]);
    }

    /**
     * @inheritDoc
     */
    public function findUser(AuthData $data): User|null
    {
        return $this->authRepository->findWhere(['name' => $data->name])->first();
    }
}
