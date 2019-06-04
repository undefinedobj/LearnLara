<?php

namespace App\Http\Controllers;

use Mrgoon\AliSms\AliSms;
use Illuminate\Container\Container;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class AlismsController
{
    /**
     * @var $request
     */
    protected $request;

    /**
     * AlismsController constructor.
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

        return $factory->make('alicms.index');
    }

    /**
     * 发送验证码
     *
     * @param AliSms $aliSms
     */
    public function send(AliSms $aliSms)
    {
//        获取手机号
        $tel = $this->request->request->get('tel');

        dd($tel);

        $config = [
            'access_key'    => 'LTAI2SQN0ySC6Pty',
            'access_secret' => 'bfAhvoc488gsEHr1q56py4AeCOfsXk',
            'sign_name'     => '益分享',
        ];

//        发送验证码
        $response = $aliSms->sendSms(
            $tel,
            'SMS_163465995',
            [
                'name'              => 'value',
                'code'              => rand(100000, 999999)
            ],
            $config
        );

        dd($response);
    }
}
