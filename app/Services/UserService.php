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

    /**
     * Retrieve user information
     * @param string $login user login
     * @return string json response
     */
    private function getUserFromGit(string $login): string
    {
        $response = Http::acceptJson()->get("https:/api.github.com/users/" . $login);

        return $response->body();
    }

    /**
     * json response with user information
     * @param string $login user login
     * @param string $user json with user informations
     * @return bool 
     */
    private function createJsonFile(string $login, string $user): bool
    {
        if ($this->isJson($user)) {
            return Storage::disk('public')->put("$login.json", $user);
        }
        throw new Exception(__('messages.user.errors.store'));
    }

    /**
     * Check if response is a json format
     * @param string $json 
     * @return bool
     */
    private function isJson(string $json): bool
    {
        json_decode($json);
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
