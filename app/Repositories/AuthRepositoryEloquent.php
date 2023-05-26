<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class AuthRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AuthRepositoryEloquent extends BaseRepository implements AuthRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }
}
