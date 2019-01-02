<?php
namespace App\Controller\Entity;

// use App\Controller\Ability\Swim;
// use App\Controller\Ability\Force;
use App\Common\DuckModuleFactory;
use App\Common\DuckModuleInterface;

class Duck
{
    // 能力
    // protected $power = [];

    // 模块
    public $module; 

    // public function __construct(array $modules)
    public function __construct(DuckModuleInterface $module)
    {
        $this->module = $module;
        // $this->swim = new Swim(50, 20);
        
        // 工厂模式实现
        // $factory = new DuckModuleFactory();
        // $this->power = $factory->makeModule('Swim', [50, 66]);
        // foreach ($modules as $module_name => $module_value) {
        //     $this->power[$module_name] = $factory->makeModule($module_name, $module_value);
        // }
    }

    // public function test()
    // {
    //     return $this->module;
    // }

    // public function test($name)
    // {
    //     return $this->power[$name];
    // }

    // public static 
    // public function __get($name)
    // {
    //     return $this->module[$name];
    // }




}