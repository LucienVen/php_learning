<?php
class Superman{
    public $module;

    public function __construct(SuperModuleInterface $module){
        $this->module = $module;
    }
}

interface SuperModuleInterface{
    /**
     * 超能力激活方法
     *
     * 任何一个超能力都得有该方法，并拥有一个参数
     *@param array $target 针对目标，可以是一个或多个，自己或他人
     */
    public function activate(array $target = []);
}

/**
 * X-超能量
 */
class XPower implements SuperModuleInterface{
    public function activate(array $target = []){
        echo "X-超能量 发射||===========></br>";
    }
}

/**
 * 终极炸弹 （就这么俗）
 */
class UltraBomb implements SuperModuleInterface{
    public function activate(array $target = []){
        echo "***（（（！！终极炸弹大爆炸！！）））***</br>";
    }
}

/**
 * 超级工厂
 */
class SuperFactory{
    protected $sets;

    protected $instances;

    //绑定、注册、注入其实就是记录一个名称对应的回调方法！！
    public function set($name, $callback){
        if ($callback instanceof Closure) {
            //通过闭包创建
            $this->binds[$name] = $callback;
        } else {
            //通过实例属性直接返回！防止同样的已近造出来超能力实例又创建(new)一次
            $this->instances[$name] = $callback;
        }
    }

    //执行该名称的回调方法，名称是必须的，不然找不到回调方法，参数是可选的
    public function get($name, $parameters = []){
        if ( isset($this->instances[$name]) ) {
            return $this->instances[$name]; //如果已经生产过了，就直接返回，无需再加工。
        }

        array_unshift($parameters, $this); //将超级工厂放入数组顶的目的是 call_user_func_array调超级工厂对象方法

        return call_user_func_array($this->binds[$name], $parameters);      
    }
}
/*
call_user_func_array ( callable $callback , array $param_arr )
第一个参数支持各种类型，方法的引用、方法名的字符串、对象方法数组
第二个参数就是给要调用的方法传参数
调普通方法 foobar($a,$b)
call_user_func_array("foobar", array("one", "two"));
调对象方法 $foo->bar($a,$b)
$foo = new foo;
call_user_func_array(array($foo, "bar"), array("three", "four"));
*/

// ******************  华丽丽的分割线  **********************
// 创建一个容器
$factory = new SuperFactory;

// 向该 超级工厂 添加 超人 的生产脚本/回调方法
$factory->set('superman', function($factory, $powerName) {
    return new Superman($factory->get($powerName));//【特殊】构造的时候要传入超级工厂make/get出来的超能力
    //$factory->get($powerName)
    //$factory->get($powerName,[])
    //$factory->get('xpower',[])        
    //call_user_func_array(xpower的回调方法, [$factory]);
    /*
    call_user_func_array(function($factory) {
        return new XPower;
    }, [$factory,"xpower"]);
    */
});

// 向该 超级工厂 添加 超能力模组 的生产脚本/回调方法
$factory->set('xpower', function($factory) {
    return new XPower;
});

// 同上
$factory->set('ultrabomb', function($factory) {
    return new UltraBomb;
});

// ******************  华丽丽的分割线  **********************
// 开始启动生产
$superman_1 = $factory->get('superman', ['xpower']);
$superman_2 = $factory->get('superman', ['ultrabomb']);
$superman_3 = $factory->get('superman', ['xpower']);
//$factory->get('superman', ['xpower']);
//call_user_func_array(superman的回调方法, [$factory,"xpower"]);
/*
call_user_func_array(function($factory, $powerName) {
    return new Superman($factory->get($powerName));
}, [$factory,"xpower"]);
*/

$superman_1->module->activate();
$superman_2->module->activate();
$superman_3->module->activate();