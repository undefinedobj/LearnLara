<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/22 0022
 * Time: 14:46
 */

//简单工厂模式 FactorySimple

class MySQL{

}

Class Sqlite{

}

Class Factory{
    public static function getDB($type)
    {
        if($type == 'MySQL') {
            return new MySQL();
        } elseif ($type == 'Sqlite') {
            return new Sqlite();
        } else{
            throw new \mysql_xdevapi\Exception('sorry', 101);
        }
    }
}

//获取DB对象
echo '<pre/>';
print_r(Factory::getDB('Sqlite'));
