<?php
// 实体类
class Duck
{
    public $module;

    public function __construct(DuckModuleInterface $module)
    {
        $this->module = $module;
    }
}

// 属性接口
interface DuckModuleInterface
{
    public function callMe(array $target = []);
}

// 发光 属性
class Light implements DuckModuleInterface
{
    public function callMe(array $target = [])
    {
        return '*** 发光鸭！ ***';
    }
}

// 游泳 属性
class Swim implements DuckModuleInterface
{
    public function callMe(array $target = [])
    {
        return '*** 跑路鸭！ ***';
    }
}

/**
 * 基础容器
 */
class Container
{
    protected $binds;
    protected $instances;

    // 绑定注册
    public function set($name, $callback)
    {
        // var_dump($callback);
        if ($callback instanceof Closure) {
            $this->binds[$name] = $callback;
        } else {
            $this->instances[$name] = $callback;
        }
    }

    // 创建关联实例
    public function get($name, $param = [])
    {
        if (isset($this->instances[$name])) {
            return $this->instances[$name];
        }

        array_unshift($param, $this);

        return call_user_func_array($this->binds[$name], $param);
    }
}


/************** 分割线 *****************************/

$contain = new Container; 

$contain->set('duck', function($contain, $moduleName){
    return new Duck($contain->get($moduleName));
});

$contain->set('light', function($contain){
    return new Light;
});

$contain->set('swim', function($contain){
    return new Swim;
});


// 开始生产
$duck_one = $contain->get('duck', ['light']);
$duck_two = $contain->get('duck', ['swim']);

// test
$res = $duck_one->module->callMe();
$res1 = $duck_two->module->callMe();
// var_dump($res);
// var_dump($res1);
var_dump($duck_one);