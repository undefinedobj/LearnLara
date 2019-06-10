<?php

/*
|--------------------------------------------------------------------------
| 单例模式三大原则
|--------------------------------------------------------------------------
| 1.构造函数需要标记为非 public (防止外部使用 new 创建对象), 单例类不能在其他类中实
|   例化, 只能被其自身实例化;
| 2.拥有一个保存类的实例的静态成员变量 $_instance;
| 3.拥有一个访问这个实例的公共的静态方法(即入口).
*/
class ConnectTwo
{
    /**
     * @var static $_instance
     */
    static protected $_instance;

    /**
     * @var false|mysqli
     */
    static protected $_connect;

    /**
     * ConnectTwo constructor.
     */
    protected function __construct()
    {
        $config = require_once('../../config/database.php');

        self::$_connect = mysqli_connect(
            $config['host'],
            $config['username'],
            $config['password'],
            $config['database'],
            $config['port']
        ) or die('mysql connect error' . mysqli_error());

        mysqli_set_charset(self::$_connect, $config['charset']);
    }

    /**
     * @return ConnectTwo
     */
    static public function getInstance()
    {
        // 判断这个类有没有被实例化(单例模式)
        if (! (self::$_instance instanceof self)) {
            self::$_instance = new self();
        }

        return  self::$_instance;
    }

    /**
     * @return false|mysqli
     */
    public function connect()
    {
        // 链接失败
        if (! self::$_connect) {
            die('mysql connect error' . mysqli_error());
        }

        return self::$_connect;

    }
}

$connect = ConnectTwo::getInstance()->connect();

$sql = "select * from `users`";

$result = mysqli_query($connect, $sql);

//$db = mysqli_fetch_row($result);
$db = mysqli_num_rows($result);

var_dump($db);