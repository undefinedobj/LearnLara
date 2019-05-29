<?php
require_once '../vendor/autoload.php';

$array = [
    'a' => 1,
    'b' => 2,
    'c' => [],
];

$a = $array['c'] ?? 0;
$b = $array['c'] ?: 0;
$c = $array['d'] ?? 0;
$d = $array['d'] ?: 0;
$e = $array['c'] ? 1 : 0;
$f = isset($array['c']) ? 1 : 0;
$g = $array['d'] ? 1 : 0;
$h = isset($array['d']['e']) ? 1 : 0;
$i = !empty($array['c']) ? 1 : 0;
$j = !empty($array['d']) ? 1 : 0;

var_dump($a);
//var_dump($b);
var_dump($c);
//var_dump($d);
//var_dump($e);
//var_dump($f);
//var_dump($g);
//var_dump($h);
//var_dump($i);
//var_dump($j);
