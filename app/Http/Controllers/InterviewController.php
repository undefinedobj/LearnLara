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
     * 冒泡排序
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
    
}