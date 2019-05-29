<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/24 0024
 * Time: 10:12
 */

require_once '../vendor/autoload.php';

use Illuminate\Database\Eloquent\Model  as Eloquent;
use Illuminate\Support\Facades\DB;

class Test extends  Eloquent
{
    protected $table = 'test';

}

$tests = new Test();
dd($tests);

// 查询全部
/*$users = Test::all();

// 创建数据
$user = new Test;
$user->username = 'someone';
$user->email = 'some@overtrue.me';
$user->save();*/

// ... 更多