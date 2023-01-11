<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

interface UserServiceInterface
{
    /**
     * List of companies
     * @param string $login user idenfifier into github
     * @return bool 
     */
    public function store(string $login): bool;
}
