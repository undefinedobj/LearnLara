<?php
require '../vendor/autoload.php';

trait Hello
{
    public function sayHello()
    {
        echo 'Hello ';
    }

    public function play(array $array)
    {
        foreach ($array as $key => $value) {
            echo 'Play '.$value.' !'.'<br/>';
        }
    }
}

trait World {
    public function sayWorld()
    {
        echo 'World';
    }
}

class MyHelloWorld
{
    use Hello, World;
    public function sayExclamationMark()
    {
        echo '！';
    }
}

$o = new MyHelloWorld();
$o->sayHello();
$o->sayWorld();
$o->sayExclamationMark();
echo '<br/>';

$array = ['football', 'basketball', 'golf'];
$o->play($array);
dd($array);
