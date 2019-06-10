<?php

$app['router']->get('/', function(){
    return '<h1>山寨版 Laravel 框架构建成功<h1/>';
});
/*
|--------------------------------------------------------------------------
| PHP - 数组操作练习 DEMO
|--------------------------------------------------------------------------
|
*/
// Array expansion operator - 数组展开运算符, 可以减少 foreach 的使用, [注意] 仅适用于带数字键的数组
$app['router']->get('array', 'App\Http\Controllers\ArrayController@index');
// 合并数组的三种方式     $array + $arr            array_merge()      array_merge_recursive()
$app['router']->get('array/merge', 'App\Http\Controllers\ArrayController@merge');

//Alisms 发送短信验证码
$app['router']->get('alisms', 'App\Http\Controllers\AlismsController@index');
$app['router']->post('alisms', 'App\Http\Controllers\AlismsController@send');

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
//冒泡排序 & 快速排序
$app['router']->get('interview/bubbling-sort', 'App\Http\Controllers\InterviewController@index');
//array_merge_recursive — 递归地合并一个或多个数组
$app['router']->get('interview/merge-recursive', 'App\Http\Controllers\InterviewController@mergeRecursive');
//is_numeric 检查用户提交的数据是否为整数
$app['router']->get('interview/response-total', 'App\Http\Controllers\InterviewController@respnseTotal');
$app['router']->post('interview/response-total', 'App\Http\Controllers\InterviewController@verifyTotal');
//兼容Unicode文字的字符串大小写转换的功能
$app['router']->get('interview/str-to-upper', 'App\Http\Controllers\InterviewController@strToUpper');
