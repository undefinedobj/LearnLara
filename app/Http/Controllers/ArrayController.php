<?php

namespace App\Http\Controllers;

class ArrayController
{
    /**
     * ... 数组展开运算符, 可以减少 foreach 的使用, [注意] 仅适用于带数字键的数组
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


    /**
     * PHP 合并数组的常用三种方式
     *
     * 1. 加号    2. array_merge()    3. array_merge_recursive
     */
    public function merge()
    {
        /**
         * 1. 加号
         *
         * 若两个数组是数组下标,且两个数组中元素的下标相同,则第一个数组的元素会 覆盖 第二个数组的元素
         */
        $fruit_1 = ['apple', 'banana', 'orange', 'pear'];
        $fruit_2 = ['lemon', 'grape', 7 => 'peach', 8 => 'pineapple'];

        $fruit = $fruit_1 + $fruit_2;

        dump($fruit);

        /**
         * 2. array_merge()
         *
         * 将一个或多个数组的单元合并起来，一个数组中的值附加在前一个数组的后面。返回作为结果的数组。
         * 如果输入的数组中有相同的字符串键名，则该键名后面的值将覆盖前一个值。
         * 然而，如果数组包含数字键名，后面的值将不会覆盖原来的值，而是附加到后面。
         * 如果只给了一个数组并且该数组是数字索引的，则键名会以连续方式重新索引。
         */
        $array = array_merge($fruit_1, $fruit_2);

        dump($array);

        /**
         * 3. array_merge_recursive()
         *
         * 递归地把一个或多个数组合并为一个数组
         * 该函数与 array_merge() 函数的区别在于处理两个或更多个数组元素有相同的键名时。
         * array_merge_recursive() 不会进行键名覆盖，而是将多个相同键名的值递归组成一个数组。
         */
        $human_1 = ['name'=>'wangYu', 'age'=>18];
        $human_2 = ['name'=>'liRui', 'age'=>22];

        $arr = array_merge_recursive($fruit_1, $fruit_2, $human_1, $human_2);

        dump($arr);
    }
}