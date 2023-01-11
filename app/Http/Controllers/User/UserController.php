<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserServiceInterface;

class UserController extends Controller
{
    public function __construct(private UserServiceInterface $userService)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @throws Exception 
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->userService->store($request->get('login'));
    }
}
