<?php

// 调用自动加载文件, 添加自动加载文件函数
require __DIR__.'/../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager;

// 添加完自动加载文件就可以实例化 IoC 容器(服务容器)，
// 实例化服务容器，接着注册事件和路由器服务注册 Provider (路由服务提供者)
$app = new Illuminate\Container\Container();

// 注册路由器和事件 with 提供链式加载 可以不用定义变量直接调用对象
with(new \Illuminate\Events\EventServiceProvider($app))->register();
with(new \Illuminate\Routing\RoutingServiceProvider($app))->register();

//启动 Elequent ORM 模块并进行相关配置
//实例化 Eloquent ORM 模块阶段需要用到数据库的管理类, 即 Manager
$manager = new Manager();
//向管理器注册连接。
$manager->addConnection(require_once '../config/database.php');
//引导 Eloquent 并准备使用(即初始化).
$manager->bootEloquent();

// 加载路由文件
require __DIR__.'/../routes/web.php';

// 实例化请求并分发处理请求
$request = \Illuminate\Http\Request::createFromGlobals();
$response = $app['router']->dispatch($request);

//返回请求响应
$response->send();

