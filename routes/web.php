<?php

$app['router']->get('/', function(){
    return '<h1>手动构建 Laravel 框架成功<h1/>';
});

// Array expansion operator - 数组展开运算符, 可以减少 foreach 的使用
$app['router']->get('array', 'App\Http\Controllers\ArrayController@index');

//Laravel-Eloquent (ORM) 查询
$app['router']->get('welcome', 'App\Http\Controllers\WelcomeController@index');

//Laravel-Eloquent (ORM) insert
$app['router']->get('user/create', 'App\Http\Controllers\UserController@create');
$app['router']->post('user', 'App\Http\Controllers\UserController@store'); // Fatal error - 致命错误

//Array and Tightenco\Collect\Support\Collection
$app['router']->get('demo/array', 'App\Http\Controllers\DemoController@index');
$app['router']->get('demo/carbon', 'App\Http\Controllers\DemoController@carbon');
$app['router']->get('demo/collect', 'App\Http\Controllers\DemoController@collect');

//Form Submit 与 Symfony\Component\HttpFoundation\Request
$app['router']->get('demo/form', 'App\Http\Controllers\FormController@index');
$app['router']->post('demo/form/submit', 'App\Http\Controllers\FormController@store');
$app['router']->get('demo/form/create', 'App\Http\Controllers\FormController@create');
$app['router']->get('demo/form/arr', 'App\Http\Controllers\FormController@arr');

//Exception 异常处理
$app['router']->get('exception', 'App\Http\Controllers\ExceptionController@index');

//FormSubmit for Radio
$app['router']->get('form/radio', 'App\Http\Controllers\SelectFormController@index');
$app['router']->post('form/radio', 'App\Http\Controllers\SelectFormController@store');

//Validation
$app['router']->get('validation', 'App\Http\Controllers\ValidationController@index');
$app['router']->post('validation', 'App\Http\Controllers\ValidationController@store');

//PHP批量生成优惠码
$app['router']->get('discount-coupon', 'App\Http\Controllers\DiscountCouponController@index');

//创造随机字符串
$app['router']->get('gen-random-str', 'App\Http\Controllers\GenRandomStrController@index');

//序列化
$app['router']->get('serialize', 'App\Http\Controllers\SerializeController@index');

/*
|--------------------------------------------------------------------------
| The interview question
|--------------------------------------------------------------------------
|
| The interview 题库
| http://www.php.cn/toutiao-415599.html
|
*/
$app['router']->get('interview/bubblingSort', 'App\Http\Controllers\InterviewController@index');
