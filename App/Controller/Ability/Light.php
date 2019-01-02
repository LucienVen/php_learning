<?php
namespace App\Controller\Ability;

use App\Common\DuckModuleInterface;

class Light implements DuckModuleInterface
{
    // 亮度
    protected $lightness;
    // 照明距离
    protected $distance;

    public function __construct($lightness, $distance)
    {
        $this->lightness = $lightness;
        $this->distance = $distance;
    }

    public function callMeByYourName(array $target = [])
    {
        return '*** 放光鸭! ***';
    }
}