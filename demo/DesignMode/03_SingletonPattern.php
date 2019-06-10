<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/22 0022
 * Time: 15:14
 */

/*
|--------------------------------------------------------------------------
| 单例模式  SingletonPattern    即单个实例对象(只能new出一个对象)
|--------------------------------------------------------------------------
|   单例模式三大原则
|
| 1.构造函数需要标记为非 public (防止外部使用 new 创建对象), 单例类不能在其他类中实
|   例化, 只能被其自身实例化;
| 2.拥有一个保存类的实例的静态成员变量 $_instance;
| 3.拥有一个访问这个实例的公共的静态方法(即入口).
*/
class SingletonPattern{

    protected $rand;

    protected static $_instance = null;

    protected function __construct()
    {
        $this->rand = mt_rand(10000, 99999);
    }

    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }

        return  self::$_instance;
    }
}

$s1 = SingletonPattern::getInstance();
$s2 = SingletonPattern::getInstance();

echo '<pre/>';
print_r($s1);echo '<br/>';
print_r($s2);echo '<br/>';

$s3 = clone $s2;

print_r($s3);echo '<br/>';

var_dump($s3 === $s1);
