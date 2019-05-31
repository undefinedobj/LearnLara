<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Container;
use Illuminate\Support\Str;
use Overtrue\Validation\Translator;
use Overtrue\Validation\Factory as ValidatorFactory;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Illuminate\Support\Facades\DB;

class UserController
{
    /**
     * @var $request
     */
    protected $request;

    /**
     * UserController constructor.
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
    public function create()
    {
        $app = Container::getInstance();

        $factory = $app->make('view');

        return $factory->make('user.create');
    }

    public function store()
    {
        //初始化工厂对象
        $factory = new ValidatorFactory(new Translator);

        $input = $this->request->request->all();

        //验证规则
        $rules = [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];

        $validator = $factory->make($input, $rules);

        //判断验证是否通过
        if ($validator->passes()) {
            //通过
            $data = [
                'avatar'        => 'https://lorempixel.com/256/256/?37837',
                'confirm_code'  => Str::random(48),
                'password'      => md5($input['password'])
            ];

            $array = array_merge($input, $data);

//            $db = User::all()->toArray();
//            DB::table('users')->insert($array);
            $db = DB::table('users')->where('id', 1)->get();
            dd($db);

        } else {
            //未通过
            //输出错误消息
            dump($validator->messages()->all()); // 或者 $validator->errors();
        }
    }
}