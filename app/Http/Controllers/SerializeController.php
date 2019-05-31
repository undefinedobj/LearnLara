<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Carbon\Carbon;

class SerializeController
{
    public function index()
    {
//        dd(__DIR__);

        $person = new Person('ZhangSan', 44);
//        dd($person);

        $p1_string = serialize($person);
//        dd(unserialize($p1_string));

        date_default_timezone_set('PRC');
        Carbon::setLocale('zh-CN');
        $filename = Carbon::now()->timestamp;
//        dd(Carbon::now()->toDayDateTimeString());

//        将对象序列化后写入文件
        $fh = fopen($filename.'.php', "w");
        fwrite($fh, $p1_string);
        fclose($fh);

        echo "对象已序列化至<b style='color: darkgreen'> $filename.php </b>文件中,请打开查看";
    }

}