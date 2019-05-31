<?php

namespace App\Http\Controllers;

use Illuminate\Container\Container;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class SelectFormController
{
    /**
     * @var $request
     */
    protected $request;

    /**
     * FormController constructor.
     */
    public function __construct()
    {
        $this->request = new SymfonyRequest(
            $_GET,
            $_POST,
            [],
            $_COOKIE,
            $_FILES,
            $_SERVER
        );
    }

    /**
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        $app = Container::getInstance();

        $factory = $app->make('view');

        return $factory->make('radio');
    }

    public function store()
    {
//        $name = $_POST['name'];
//        print("$name");

        dd($this->request->request->all());         //  `request`只能获取`POST`提交方式的

//        dd($this->request->request->query->all());             //  `query`只能获取`GET`提交方式的

    }
}