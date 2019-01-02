<?php
/**
 * 简陋的容器
 * @data 2018/12/25 17:22:11
 */
namespace App\Common;

class Container
{
    protected $binds;

    protected $instances;

    public function bind($abstract, $concrete)
    {
        // var_dump($concrete);
        //
        if ($concrete instanceof \Closure) {
            $this->binds[$abstract] = $concrete;
        } else {
            $this->instances[$abstract] = $concrete;
        }
    }

    public function make($abstract, $parameters = [])
    {
        // if (!is_array($parameters)) {
        //     $parameters = (array) $parameters;
        // }

        if (isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }

        array_unshift($parameters, $this);
        // var_dump($this);

        return call_user_func_array($this->binds[$abstract], $parameters);

    }
}
