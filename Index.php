<?php
define('BASE_DIR', __DIR__);

// var_dump(BASE_DIR);

include BASE_DIR . '/Core/Loader.php';
spl_autoload_register("\\Core\\Loader::autoload");

// Core\Object::test();
// Core\Object::test();
// App\Controller\Home\Index::test();

// $config = [
//     'light' => [50, 30],
//     'force' => [99],
// ];

// 依赖注入
// use App\Controller\Entity\Duck;
// use App\Controller\Ability\Light;

// $Light = new Light(50, 30);
// $duck = new Duck($Light);

// var_dump($duck->test());

// echo '-------------------------------------------------------------' . PHP_EOL;
// var_dump($duck->test()->callMeByYourName());

// 简单容器实现
use App\Common\Container;
use App\Controller\Ability\Light;
use App\Controller\Entity\Duck;

// 创建容器
$container = new Container;
// 添加 Duck 实体生产脚本
$container->bind('duck', function ($container, $moduleName) {
    return new Duck($container->make($moduleName));
});

// var_dump(function($container, $moduleName){
//     return new Duck($container->make($moduleName));
// });
// die;

// 添加 Light 能力脚本
$container->bind('light', function ($container) {
    return new Light(20, 60);
});

$duck_with_light = $container->make('duck', ['light']);
var_dump($duck_with_light);
var_dump($duck_with_light
        ->module
        ->callMeByYourName());

// $container = new Container;

// $container->bind('duck', function($container, $module){
//     return new Duck($container->make($module));
// });

// $container->bind('light', function($container){
//     return new Light;
// });

// $duck = $container->make('duck', ['light']);

// // var_dump($duck-);
// $duck->module;
