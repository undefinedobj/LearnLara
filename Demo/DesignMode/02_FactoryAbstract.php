<?php

//简单工厂模式

class MySQL{

}

Class Sqlite{

}

class  MyPDO{

}

//Class Factory{
//    public static function getDB($type)
//    {
//        if($type == 'MySQL') {
//            return new MySQL();
//        } elseif ($type == 'Sqlite') {
//            return new Sqlite();
//        } elseif ($type == 'MyPDO'){
//            return new MyPDO();
//        } else{
//            throw new \mysql_xdevapi\Exception('sorry', 101);
//        }
//    }
//}
//
////获取DB对象
//print_r(Factory::getDB('WH'));


//抽象工厂  FactoryAbstract
interface Factory{
    public static function getDB();
}

class MySQLFactory implements Factory{
    public static function getDB()
    {
        return new MySQL();
    }
}

class SqliteFactory implements Factory{
    public static function getDB()
    {
        return new Sqlite();
    }
}

class MyPDOFactory implements Factory{
    public static function getDB()
    {
        return new MyPDO();
    }
}


//配置文件
$factory = 'MyPDOFactory';
$db = MyPDOFactory::getDB();
print_r($db);



















