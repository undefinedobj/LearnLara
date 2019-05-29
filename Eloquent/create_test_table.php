<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/24 0024
 * Time: 10:08
 */
//包含Eloquent的初始化文件
require_once 'config.php';

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('test', function($table)
{
    $table->increments('id');
    $table->string('name', 40);
    $table->string('email')->unique();
    $table->timestamps();
});