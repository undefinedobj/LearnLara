<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/24 0024
 * Time: 12:05
 */

require_once '../vendor/autoload.php';

use Illuminate\Support\Facades\DB;
use Test;

class TestController
{
    public function index($id)
    {
        $db = DB::table('test')->where('id',$id)->get();
        dd($db);
        return $db;
    }
}

$t = new TestController();

var_dump($t->index(2));
