<?php

namespace App\Http\Controllers;

use App\Models\User;

class WelcomeController
{
    public function index(User $user)
    {
//        return 'New WelcomeController Class Success';

        $result = $user->first();

        dd($result->toArray());
    }

}