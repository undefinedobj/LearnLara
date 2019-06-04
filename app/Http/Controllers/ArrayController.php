<?php

namespace App\Http\Controllers;

class ArrayController
{
    /**
     * ... 数组展开运算符, 可以减少 foreach 的使用
     *
     * https://segmentfault.com/q/1010000006789348?_ea=1131965
     * http://php.net/manual/zh/migration56.new-features.php
     *
     * @return mixed
     */
    public function index()
    {
        $operators = [2, 3];

//        dd(...$operators);  // [2] 和 [3]

//        这里使用了 ... 即数组展开运算符, 可以有效的减少 foreach 的使用, 提高效率,降低内存开销
        return $this->add(1, ...$operators);    // 6
    }

    /**
     * @param $a
     * @param $b
     * @param $c
     * @return mixed
     */
    public function add($a, $b, $c)
    {
        return $a + $b + $c;
    }
}