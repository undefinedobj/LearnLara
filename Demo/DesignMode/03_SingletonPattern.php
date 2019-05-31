<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/22 0022
 * Time: 15:14
 */

//单例模式  SingletonPattern    即单个实例对象(只能new出一个对象)

class SingletonPattern{

    protected $rnd;

    protected static $ins = null;

    protected function __construct()
    {
        $this->rnd = mt_rand(10000, 99999);
    }

    public static function getIns()
    {
        if (self::$ins === null) {
            self::$ins = new self();
        }

        return  self::$ins;
    }
}

$s1 = SingletonPattern::getIns();
$s2 = SingletonPattern::getIns();

echo '<pre/>';
print_r($s1);echo '<br/>';
print_r($s2);echo '<br/>';

$s3 = clone $s2;

print_r($s3);echo '<br/>';

var_dump($s3 === $s1);