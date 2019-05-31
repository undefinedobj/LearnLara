<?php

namespace App\Http\Controllers;

use Illuminate\Container\Container;
use Overtrue\Validation\Translator;
use Overtrue\Validation\Factory as ValidatorFactory;
use Symfony\Component\HttpFoundation\Request;

class ValidationController
{
    /**
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        $app = Container::getInstance();

        $factory = $app->make('view');

        return $factory->make('validation');
    }

    public function store()
    {
        //初始化工厂对象
        $factory = new ValidatorFactory(new Translator);
        $request = new Request(
            $_GET,
            $_POST,
            [],
            $_COOKIE,
            $_FILES,
            $_SERVER
        );

        if ($request->getMethod() === 'POST' ) {
            $input = $request->request->all();
        } elseif ($request->getMethod() === 'GET' ) {
            $input = $request->query->all();
        } else {
            throw new \Exception('只能通过 `GET` 或 `POST` 形式提交表单');
            exit();
        }

//        dd($request->query->all());    //  `query`只能获取`GET`提交方式的
//        dd($request->request->all());   //  `request`只能获取`POST`提交方式的

        //验证
        $rules = [
            'username' => 'required|min:4',
            'password' => 'required|min:6',
        ];

        $validator = $factory->make($input, $rules);

        //判断验证是否通过
        if ($validator->passes()) {
            //通过
            echo '验证通过';
        } else {
            //未通过
            //输出错误消息
            dump($validator->messages()->all()); // 或者 $validator->errors();
        }
    }
}