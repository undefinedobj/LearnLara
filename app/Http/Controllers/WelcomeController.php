<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Container;

class WelcomeController
{
    public function index(User $user)
    {
        $user = $user->first();

//        dd($user->toArray());
//        dd($user->getAttributes());

        $app = Container::getInstance();

        $factory = $app->make('view');

        return $factory->make('welcome', ['user' => $user]);
    }

}