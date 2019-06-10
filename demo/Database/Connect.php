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
class Connect
{
    /**
     * @var static $_instance
     */
    static protected $_instance;

    /**
     * @var static $_connectSource
     */
    static protected $_connectSource;

    /**
     * @var array
     */
    protected $config = [
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'port'      => 3306,
        'database'  => 'file',
        'username'  => 'root',
        'password'  => 'root',
        'charset'   => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
    ];

    /**
     * Connect constructor.
     */
    protected function __construct()
    {

    }

    /**
     * @return Connect
     */
    static public function getInstance()
    {
        // 如果当前对象不存在, 就 new self()
        if (! (self::$_instance instanceof self)) {
            self::$_instance = new self();
        }

        return  self::$_instance;
    }

    /**
     * @return Connect|false|mysqli
     */
    public function connect()
    {
        if (! self::$_connectSource) {
            self::$_connectSource = mysqli_connect(
                $this->config['host'],
                $this->config['username'],
                $this->config['password']
            );

            if (! self::$_connectSource) {
                die('mysql connect error' . mysqli_error());
            }

            // 连接指定数据库
            mysqli_select_db(self::$_connectSource, $this->config['database']);

            // 设置字符集
            mysqli_query(self::$_connectSource, "set names {$this->config['charset']}");
        }
        return self::$_connectSource;
    }
}

$connect = Connect::getInstance()->connect();

$sql = "select * from `users`";

$result = mysqli_query($connect, $sql);

$a = mysqli_fetch_row($result);
//$a = mysqli_num_rows($result);

var_dump($a);

/*$connect = mysqli_connect('localhost','root', 'root', 'file', 3306);
mysqli_set_charset($connect, 'utf8mb4');

$sql = "select * from `users`";

$result = mysqli_query($connect, $sql);

$db = mysqli_fetch_row($result);
//$db = mysqli_num_rows($result);

print_r($db);*/