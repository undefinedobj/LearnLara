<?php

namespace App\Http\Controllers;

use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class FormController
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

    public function index()
    {
        $app = Container::getInstance();

        $factory = $app->make('view');

        return $factory->make('form');
    }

    public function store()
    {
//        dd($this->request->request->query->all());             //  `query`只能获取`GET`提交方式的
        dd($this->request->request->all());         //  `request`只能获取`POST`提交方式的
    }

    public function store2(Request $request)
    {
        dd($request->all());
    }

    public function create()
    {
        $request = SymfonyRequest::create(
            '/demo/form/create',
            'GET',
            array('name' => 'WangYu')
        );

//        dd($request->query->all());
//        dd($request->query->filter('name'));

        $request->query->add([
            'age' => 12,
            'sex' => 'boy',
        ]);
//        dd($request->getContent([true]));

//        dd($request->query->get('name'));

//        dd($request);
        echo '<pre>';
        var_dump($request);
    }

    public function arr()
    {
        $array = [
            'a' => 1,
            'b' => 2,
            'c' => [],
        ];

        $a = $array['c'] ?? 0;
        $b = $array['c'] ?: 0;
        $c = $array['d'] ?? 0;
        $d = $array['d'] ?: 0;
        $e = $array['c'] ? 1 : 0;
        $f = isset($array['c']) ? 1 : 0;
        $g = $array['d'] ? 1 : 0;
        $h = isset($array['d']['e']) ? 1 : 0;
        $i = !empty($array['c']) ? 1 : 0;
        $j = !empty($array['d']) ? 1 : 0;

        var_dump($a);
//        var_dump($b);
        var_dump($c);
//        var_dump($d);
//        var_dump($e);
//        var_dump($f);
//        var_dump($g);
//        var_dump($h);
//        var_dump($i);
//        var_dump($j);
    }
}