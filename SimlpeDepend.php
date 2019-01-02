<?php
/**
 * 简单依赖描述（不使用命名空间）
 */

// 游泳属性
class Swim
{
    protected $keep_time;
    protected $speed;

    public function __construct($speed, $keep_time)
    {
        $this->speed = $speed;
        $this->keep_time = $keep_time;
    }

    public function callMe()
    {
        return '--- 跑路鸭！ ---';
    }
}

// 鸭子实体
class Duck
{
    protected $ability;
    
}



