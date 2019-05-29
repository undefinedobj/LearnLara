<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/24 0024
 * Time: 10:10
 */

//包含Eloquent的初始化文件
require_once 'config.php';

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::table('test')->insert([
    [
        'name' => 'Hello1',
        'email' => 'hello1@world.com',
    ],
    [
        'name' => 'Carlos1',
        'email' => 'anzhengchao1@gmail.com',
    ],
    [
        'name' => 'Jack1',
        'email' => 'mark1@hello.com',
    ],
]);
