<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Tightenco\Collect\Support\Collection;

class DemoController
{
    protected  $array = [
        "low_price" => [
            0 => "1",
            1 => "2",
            2 => "3",
            3 => null
        ],
        "high_price" => [
            0 => "11",
            1 => "22",
            2 => "33",
            3 => null,
        ],
        "integral_num" => [
            0 => "111",
            1 => "222",
            2 => "333",
            3 => null
        ]
    ];

    protected  $insert = [
        [
            'low_price'     => 1,
            'high_price'    => 11,
            'integral_num'  => 111
        ],
        [
            'low_price'     => 2,
            'high_price'    => 22,
            'integral_num'  => 222
        ],
        [
            'low_price'     => 3,
            'high_price'    => 33,
            'integral_num'  => 333
        ],
    ];

    public function index()
    {
        $collection = collect($this->array);

        dd($collection);

        $column = $collection->keys()->values()->all();
        $count = $collection->count();
        $collection->map(function ($item, $key) use($column) {
            $new = [];
            foreach ($column as $k => $v) {
                $new[$v] = $item;
            }
            dd($new);
        });
    }

    public function carbon()
    {
        echo Carbon::now();     // 2019-05-31 03:02:41
        echo '</br>';

//        显示中文
        Carbon::setLocale('zh');
//        获取昨天的时间戳
        $ts = Carbon::yesterday()->timestamp;
//        人性化显示时间
        echo Carbon::createFromTimestamp($ts)->diffForHumans();
        echo '</br>';

        echo Carbon::now()->tzName;                        // America/Toronto
        echo '</br>';

        echo Carbon::createFromTimestamp('552695652')->diffForHumans();
        echo '</br>';
    }

    public function collect()
    {
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
dd($collection);

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
    }
}