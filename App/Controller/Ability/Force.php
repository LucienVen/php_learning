<?php
namespace App\Controller\Ability;

use App\Common\DuckModuleInterface;

class Force implements DuckModuleInterface
{
    protected $force;

    public function __construct($force)
    {
        $this->force = $force;
    }

    public function callMeByYourName(array $target = [])
    {
        return '*** 暴力鸭！ ***';
    }
}