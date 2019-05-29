<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/24 0024
 * Time: 13:53
 */

require_once '../vendor/autoload.php';

use Overtrue\Validation\Translator;
use Overtrue\Validation\Factory as ValidatorFactory;
use Symfony\Component\HttpFoundation\Request;

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

//dd($request->request->all());   //  `request`只能获取`POST`提交方式的
$input = $request->query->all();    //  `query`只能获取`GET`提交方式的

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