<?php

namespace App\Http\Controllers;

use Illuminate\Container\Container;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class InterviewController
{
    /**
     * @var $request
     */
    protected $request;

    /**
     * InterviewController constructor.
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
     * @return array
     */
    public function index()
    {
        $array = [23,12,34,2,67];

//        冒泡排序
//        return $this->bubblingSort($array);

//        快速排序
        return $this->quickSort($array);

    }

    /**
     * 冒泡排序算法的 [原理] 如下：
     *
     * 比较相邻的元素。如果第一个比第二个大，就交换他们两个。
     *
     * 对每一对相邻元素做同样的工作，从开始第一对到结尾的最后一对。在这一点，最后的元素应该会是最大的数。
     *
     * 针对所有的元素重复以上的步骤，除了最后一个。
     *
     * 持续每次对越来越少的元素重复上面的步骤，直到没有任何一对数字需要比较。
     *
     * @param $array
     * @return mixed
     */
    public function bubblingSort($array)
    {
        $length = count($array);

        $n = count($array) - 1;

        for ($i = 0; $i < $length; $i++) {

            for ($j = 0; $j < $n; $j++) {

                if ($array[$j] > $array[$j + 1]) {

                    $tmp = $array[$j];

                    $array[$j] = $array[$j + 1];

                    $array[$j + 1] = $tmp;
                }
            }
        }

        return $array;
    }

    /**
     * 快速排序
     *
     * @param $array
     * @return array
     */
    public function quickSort($array)
    {
        if (count($array) <= 1) {
            return $array;
        }

        $key = $array[0];

        $left_arr = [];

        $right_arr = [];

        for ($i=1; $i<count($array); $i++){

            if ($array[$i] <= $key){
                $left_arr[] = $array[$i];
            } else {
                $right_arr[] = $array[$i];
            }
        }

        $left_arr = $this->quickSort($left_arr);

        $right_arr = $this->quickSort($right_arr);

        return array_merge($left_arr, [$key], $right_arr);
    }

    /**
     * array_merge 简单的合并数组
     *
     * array_merge_recursive — 递归地合并一个或多个数组
     */
    public function mergeRecursive()
    {
        $ar1 = ["color" => ["favorite" => "red"], 5];
        $ar2 = [10, "color" => ["favorite" => "green", "blue"]];

        $result = array_merge_recursive($ar1, $ar2);

        dd($result);
    }

    /**
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function respnseTotal()
    {
        $app = Container::getInstance();

        $factory = $app->make('view');

        return $factory->make('interview.respnse-total');
    }

    /**
     * 请写一个函数来检查用户提交的数据是否为整数（不区分数据类型，可以为二进制、八进制、十进制、十六进制数字）
     *
     * @return string
     */
    public function verifyTotal()
    {
        $jp_total = $this->request->request->get('jp_total');
        //dd($jp_total);
        if(! is_numeric($jp_total) || strpos($jp_total,".") !== false){

            return "不是整数";

        }else{

            return "是整数";

        }
    }

    /**
     * [ 问题 ]：PHP的strtolower()和strtoupper()函数在安装非中文系统的服务器下可能会导致将汉字转换为乱码,请写
     * 两个替代的函数实现兼容Unicode文字的字符串大小写转换.
     *
     * 中文是由多字节组成的，而只有英文系统的单个英文字符只有一个字节，所以该系统把中文的每一个字节
     * 都做了strtolower()处理,改变后的中文字节拼接在一起就成了乱码(新生成的编码映射对应的字符可能就不是中文了).
     *
     * 手动解决：用str_split(string string,intstring,intsplit_length = 1)按每个字节切割，像中文能切割成三
     * 个字节，对识别到的字节若是英文字母则进行转换.
     *
     * @return string
     */
    public function strToUpper($str='null')
    {
        $str = 'a中你继续F@#$%^&*(BMDJFDoalsdkfjasl';

        // str_split() 函数把字符串分割到数组中
        $split = str_split($str, 1);

        $result = '';

        foreach($split as $value){

            // ord() 函数返回字符串的首个字符的 ASCII 值
            $value = ord($value);

            if($value >= 97 && $value<= 122){
                $value -= 32;
            }

            // chr() 函数从指定的 ASCII 值返回字符
            $result .= chr($value);
        }
        return $result;
    }
    
}