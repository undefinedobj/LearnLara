<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/23 0023
 * Time: 13:49
 */

require_once '../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\VarDumper;

$request = new Request(
    $_GET,
    $_POST,
    [],
    $_COOKIE,
    $_FILES,
    $_SERVER
);
//dd($request->request->all());         //  `request`只能获取`POST`提交方式的
dd($request->query->all());             //  `query`只能获取`GET`提交方式的

//dd('wang');

//dd($_POST);

$request = Request::create(
    '/hello-world',
    'GET',
    array('name' => 'WangYu')
);
//dd($request->query->all());
//dd($request->query->filter('name'));

$request->query->add([
    'age' => 12,
    'sex' => 'boy',
]);
dd($request->getContent([true]));

//dd($request->query->get('name'));

echo '<pre>';
var_dump($request);