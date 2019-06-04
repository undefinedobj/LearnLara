<?php

namespace App\Http\Controllers;

class InterviewController
{
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

}