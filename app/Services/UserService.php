<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService implements UserServiceInterface
{
    public function list(array $searchParams): Collection
    {
        return User::select([
            'name',
            'description',
            'email',
            'phone',
            'UF',
            'city'
        ])
            ->where($searchParams)
            ->get();
    }

    public function getValidUF(): array
    {
        return User::select('UF')->groupBy('UF')->get()->toArray();
    }

    public function getValidStateCities($uf): array
    {
        return User::select('city')->where('UF', $uf)->groupBy('city')->get()->toArray();
    }

    public function getValidCity(): array
    {
        return User::select('city')->groupBy('city')->get()->toArray();
    }

    public function checkIfEmailExist(string $email): bool
    {
        return !is_null(User::where(['email' => $email])->first());
    }
}
