<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/23 0023
 * Time: 11:26
 */

require_once '../vendor/autoload.php';
use Carbon\Carbon;

//echo Carbon::now(); //2016-10-14 20:21:20

//显示中文
Carbon::setLocale('zh');
//获取昨天的时间戳
$ts = Carbon::yesterday()->timestamp;
//人性化显示时间
echo Carbon::createFromTimestamp($ts)->diffForHumans();
echo '</br>';

echo Carbon::now()->tzName;                        // America/Toronto
echo '</br>';

echo Carbon::createFromTimestamp('552695652')->diffForHumans();
echo '</br>';