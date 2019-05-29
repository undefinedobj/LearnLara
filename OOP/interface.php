<?php

/*
|---------------------------------------------------------------------------
| 依赖的实例
|---------------------------------------------------------------------------
|
| 这里要实现的功能是旅游者游西藏,而游西藏可能存在很多种方法,如走路、火车、或开车,
| 不同的方法需要不同的工具,如腿、火车和小汽车等等。当我们在交通基本靠走的时代里,
| 游西藏用的交通就是腿,在代码 "$this->trafficTool = new Leg();"中实例化了腿,
| 于是上述代码两个组件间就产生了依赖。在程序中依赖可以理解为一个对象实现某个功能
| 需要其他对象相关功能的支持。当用 new 关键字在一个组件内部实例化一个对象时就解决
| 了一个依赖,但同时也引入了另一个严重的问题——耦合。在简单情况下可能看不出耦合有
| 多大问题,但是如果需求改变,如需求实例化的交通工具是火车、汽车，甚至是在设计中,还
| 不太清楚的工具时,就需要经常改变实例化的对象,若又有很多地方用到这段代码,而此程序
| 又不是你自己写的,这时你面对的将是一个噩梦。所以,这里我们不应该在"旅游者"类的内部
| 固化"交通工具"的初始化行为,而是转由外部负责,在系统运行期间,将这种依赖关系通过动
| 态注入的方式实现,这就是 IOC（Inversion Of Control, 控制反转）模式的设计思想。
|
*/

/* 设计公共接口*/
interface  Visit
{
    public function go();
}

/* 实现不同交通工具类*/
class Leg implements  Visit
{
    public function go()
    {
        echo "walt to Tibet!!!";
    }
}

class Car implements Visit
{
    public function go()
    {
        // TODO: Implement go() method.
        echo "drive car to Tibet!!!";
    }
}

class Train implements Visit
{
    public function go()
    {
        // TODO: Implement go() method.
        echo "go to Tibet by train!!!";
    }
}

// /*设计旅游者类，该类在实现游西藏的功能时要依赖交通工具实例*/
//class Traveller
//{
//    protected  $trafficTool;
//    public function __construct()
//    {
////        依赖产生
//        $this->trafficTool = new Leg();
//    }
//
//    public function visitTibet()
//    {
//        $this->trafficTool->go();
//    }
//}
//
//$tra = new Traveller();
//$tra->visitTibet();         // walt to Tibet!!!


/*
|---------------------------------------------------------------------------
| 工厂模式
|---------------------------------------------------------------------------
|
| 在上面实例中我们知道,交通工具的实例化过程是经常需要改变的,所以我们将这部分提取
| 到外部来管理,这也就体现了面向对象设计的一个原则,即找出程序中会变化的方面,然后将
| 其和固定不变的方面进行互相分离（Head First 设计模式）。一种简单的实现方案是利用
| 工厂模式,这里我们只用简单工厂模式实现,当然也可以用工厂方法模板。实例如下：
|
*/

/* 设计简单工厂，对于不同的输入，实例化不同的交通工具*/
//class TrafficToolFactory
//{
//    public function createTrafficTool($name)
//    {
//        switch ($name) {
//            case 'Leg':
//                return  new Leg();
//                break;
//            case 'Car':
//                return  new Car();
//                break;
//            case 'Train':
//                return  new Train();
//                break;
//            default:
//                exit("set traffictOOL error!!!");
//                break;
//        }
//    }
//}

//class Traveller
//{
//    protected $trafficTool;
//    public function __construct($trafficTool)
//    {
////        通过工厂产生依赖的交通工具实例
//        $factory = new TrafficToolFactory();
//        $this->trafficTool = $factory->createTrafficTool($trafficTool);
//    }
//
//    public function visiTibet()
//    {
//        $this->trafficTool->go();
//    }
//}
//
//$tra = new Traveller('Train');
//$tra->visitTibet();

/*
* 这里我们添加了"交通工具"工厂，在"旅游者"实例化的过程中指定需要的交通工具,则工厂
* 生产相应的交通工具实例。在一些简单的情况下,简单工厂模式可以解决这个问题。文明看
* 倒虽然"旅游者"和"交通工具"之间的依赖关系没有了,但是却变成了"旅游者"和"交通工具工
* 厂"之间的依赖。当需求增加时,文明需要修改简单工厂模式,如果依赖增多,工厂将十分庞大
* ,依然不易于维护。
*
*/


/*
|----------------------------------------------------------------------------
| IoC模式
|----------------------------------------------------------------------------
|
| 今天的主角：IoC（Inversion of Control）模式又称依赖注入（Depe-ndency Injection）
| 模式。控制反转是将组件间的依赖关系从程序内部提到外部容器来管理,而依赖注入是指组件
| 的依赖通过外部以参数或其它形式注入,两张说法其实本质上是一个意思。下面是简单的依赖
| 注入实例：
|
*/

//class Traveller
//{
//    protected $trafficTool;
//    public function __construct($trafficTool)
//    {
//        $this->trafficTool = $trafficTool;
//    }
//
//    public function visitTibet()
//    {
//        $this->trafficTool->go();
//    }
//}
//
//// 生成依赖的交通工具实例
//$trafficTool = new Leg();
//// 依赖注入的方式解决依赖问题
//$tra = new Traveller($trafficTool);
//$tra->visitTibet();     // walt to Tibet!!!

/*
*
* 上述实例就是一个依赖注入的过程,Traveller 类的构造函数依赖一个外部的具有 visit 接口
* 的实例,而在实例化 Traveller 时,我们传递一个 $trafficTool 实例,即通过依赖注入的方式
* 解决依赖问题。这里要注意一点,依赖注入需要通过接口来限制,而不能随意开放,这也体现了设
* 计模式的另一个原则——针对接口编程,而不是针对实现编程。
*     这里我们是通过手动的方式依赖注入,而通过 IoC 容器可以实现自动依赖注入。下面我们对
* Laravel 框架中的设计方法进行了简化,实现 IoC 容器完成依赖注入,代码如下：
*
*/

/* 设计容器类，容器类装实例或提供实例的回调函数*/
class Container
{
//    用于装提供实例的回调函数，真正的容器还会装实例等其他内容
//    从而实现单例等高级功能
    protected $bindings = [];

    public function bind($abstract, $concrete = null, $shared = false)
    {
        if ( ! $concrete instanceof Closure )   {
//            如果提供的参数不是回调函数，则产生默认的回调函数
            $concrete = $this->getClosure('concrete', 'shared');
        }
    }
}














