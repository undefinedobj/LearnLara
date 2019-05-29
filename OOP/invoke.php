<?php
 
class CallableClass
{
    public function __invoke($param1, $param2)
    {
        var_dump($param1,$param2);
    }
}
 
$obj  = new CallableClass;
$obj(123, 456);
 
var_dump(is_callable($obj));