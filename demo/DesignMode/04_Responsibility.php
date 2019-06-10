<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/22 0022
 * Time: 16:18
 */

class BanZhu{
    protected $power = 1;

    public function dispose()
    {
        return  '删帖';
    }
}

class Police{
    protected $power = 2;

    public function dispose()
    {
        return  '抓人';
    }
}

class GuoAn{
    protected $power = 3;

    public function dispose()
    {
        return  '坐牢';
    }
}

$report = $_POST['report'] = 6;

if ($report == 1) {
    $admin = new BanZhu();
} elseif ($report ==2) {
    $admin = new Police();
} elseif ($report ==3) {
    $admin = new GuoAn();
} else {
//    throw new Exception("Value must be 1 or below");
    throw new Exception('Division by zero.');
}

print_r($admin->dispose());
