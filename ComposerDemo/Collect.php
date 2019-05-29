<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/23 0023
 * Time: 15:22
 */

require_once '../vendor/autoload.php';
use Tightenco\Collect\Support\Collection;

//扩展集合  即给`Collection`添加方法随后使用
Collection::macro('toConcatenatedString', function ($fields = [], $separator = ' ') {
    return $this->map(function($item) use ($fields, $separator) {
        return implode($separator, array_map(function ($el) use ($item) {
                return $item[$el];
            }, $fields)
        );
    })->implode("\n");
});

Collection::macro('whereRegex', function($expression, $field) {
    return $this->map(function ($item) use ($expression, $field) {
        return preg_match($expression, $item[$field]);
    });
});


$data = [
    ['first_name' => 'John', 'last_name' => 'Doe', 'age' => 'twenties'],
    ['first_name' => 'Fred', 'last_name' => 'Ali', 'age' => 'thirties'],
    ['first_name' => 'Alex', 'last_name' => 'Cho', 'age' => 'thirties'],
];
//dd(collect($data));

$average = collect([['foo' => 10], ['foo' => 10], ['foo' => 20], ['foo' => 40]])->avg('foo');
//dd($average);

$collection = collect([1, 2, 3, 4]);
//dd($collection->count());
//dd($collection->sum());

$collection = collect($data)->where('age', 'thirties')
    ->sortBy('last_name')
    ->map(function($item){
        return $item['first_name'].' '.$item['last_name'];
    })->implode("\n");
//dd($collection);

//使用`Collection`的扩展方法->宏（macroable）
$collection = collect($data)->where('age', 'thirties')
    ->sortBy('last_name')
    ->toConcatenatedString(['first_name', 'last_name']);
//dd($collection);

/*-
------------------------------------------------------------------------------------
-   示例二
------------------------------------------------------------------------------------
-
- 现在让我们看下第二个示例，假设我们一个用户列表，我们需要基于角色（role）过滤出来，
- 然后进一步如果他们的注册时间为 5 年或以上且 last name 以字母 A-M 开始的仅获取第一个用户。
-
-*/

$users = [
    ['name' => 'John Doe', 'role' => 'vip', 'years' => 7],
    ['name' => 'Fred Ali', 'role' => 'vip', 'years' => 3],
    ['name' => 'Alex Cho', 'role' => 'user', 'years' => 9],
    ['name' => 'AZ', 'role' => 'vip', 'years' => 9],
];

$collection = collect($users)->where('role', 'vip')->map(function($user) {
        return preg_match('/\s[A-Z]/', $user['name']);
})->firstWhere('years', '>=', '5');
dd($collection);

//使用`Collection`的扩展方法->宏（macroable）
$collection = collect($users) -> where('role', 'vip')
    -> whereRegex('/\s[A-Z]/', 'name')
    -> firstWhere('years', '>=', 5);
//dd($collection);
