<?php
namespace Core;

class Loader
{
    static function autoload($class)
    {
        // 类名映射成文件绝对路径
        require BASE_DIR . '/' . str_replace('\\', '/', $class) . '.php';
        
    }
}