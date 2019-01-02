<?php
namespace App\Common;

use App\Controller\Ability\Swim;
use App\Controller\Ability\Light;
use App\Controller\Ability\Force;

// 工厂类
class DuckModuleFactory
{
    /**
     * 制作能力实例
     *
     * @param string $moduleName 能力名
     * @param array $value 能力值
     *
     * @return void
     */
    public function makeModule($moduleName, $value)
    {
        switch($moduleName){
            case 'Swim' :
                return new Swim($value[0], $value[1]);
            case 'Force':
                return new Force($value[0]);
            case 'Light':
                return new Light($value[0], $value[1]);
        }
    }
}