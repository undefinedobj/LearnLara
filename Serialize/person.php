<?php

require_once '../vendor/autoload.php';

use Carbon\Carbon;

class Person {
    private $name;
    private $age;

    function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    function say() {
        echo "我的名字叫：".$this->name."<br />";
        echo " 我的年龄是：".$this->age;
    }
}
$p1 = new Person("张三", 20);
$p1_string = serialize($p1);
//dd(unserialize($p1_string));

date_default_timezone_set('PRC');
Carbon::setLocale('zh-CN');
//dd(Carbon::now()->toDayDateTimeString());

$filename = Carbon::now()->timestamp;
//将对象序列化后写入文件
$fh = fopen($filename.'.php', "w");
fwrite($fh, $p1_string);
fclose($fh);
echo "对象已序列化至<b style='color: darkgreen'> $filename.php </b>文件中,请打开查看";