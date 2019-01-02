<?php
namespace App\Controller\Ability;

use App\Common\DuckModuleInterface;


class Swim implements DuckModuleInterface
{
    // 速度
    protected $speed;
    // 持续时间
    protected $keep_time;

    public function __construct($speed, $keep_time)
    {
        $this->speed = $speed;
        $this->keep_time = $keep_time;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function callMeByYourName(array $target = [])
    {
        return '*** 跑路鸭！ ***';
    }
}

// $demo = new Swim(50, 20);
// echo $demo->speed;