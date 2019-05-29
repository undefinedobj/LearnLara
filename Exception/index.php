<?php

require_once '../vendor/autoload.php';

function one()
{
    if (rand(1, 10) > 5) {
        throw new Exception('one Exception', 101);
    } else {
        return two();
    }
}

function two()
{
    if (rand(1, 10) > 5) {
        throw new Exception('two Exception', 102);
    } else {
        return two();
    }
}

function three()
{
    if (rand(1, 10) > 5) {
        throw new Exception('one Exception', 103);
    } else {
        return true;
    }
}

try{
    var_dump(one());
} catch (Exception $e) {
    echo '<pre/>';
//    dd($e);
//    var_dump($e);die;
    echo '文件：'.$e->getFile(), '<br/>';
    echo '行：'.$e->getLine(), '<br/>';
    echo '信息：'.$e->getMessage(), '<br/>';
    echo 'Trace：'.$e->getTraceAsString(), '<br/>';
}
