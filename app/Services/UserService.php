<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class UserService implements UserServiceInterface
{
    public function store(string $login): bool
    {
        $user = $this->getUserFromGit($login);

        return $this->createJsonFile($login, $user);
    }

    private function getUserFromGit(string $login): string
    {
        $response = Http::acceptJson()->get("https:/api.github.com/users/" . $login);

        return $response->body();
    }

    private function createJsonFile(string $login, string $user): bool
    {
        if ($this->isJson($user)) {
            return Storage::disk('public')->put("$login.json", $user);
        }
        throw new Exception(__('messages.user.errors.store'));
    }

    private function isJson($string): bool
    {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }

    /**
     * Nao utilizei esta funçao para verificar se o usuário ja foi cadastrado, 
     * pois, assim nao poderá atualizar as informaçoes
     */
    private function checkIfUserExist(string $login): bool
    {
        if (Storage::disk('public')->exists("$login.json"))
            throw new Exception(__('user.errors.userExists'));

        return false;
    }
}
