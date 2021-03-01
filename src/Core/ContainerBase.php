<?php

/*
 * * Author: cc
 *  * Created by PhpStorm.
 */

namespace Imactool\Jinritemai\Core;

class ContainerBase extends Container
{
    /**
     * @var array
     */
    protected $provider = [];

    /**
     * 公共配置参数.
     *
     * @var array
     */
    public $params = [];

    public function __construct(array $params = [])
    {
        $this->params = $params;

        $providerCallback = function ($provider) {
            $obj = new $provider();
            $this->serviceRegsiter($obj);
        };
        array_walk($this->provider, $providerCallback);
    }

    public function __get($key)
    {
        return $this->offsetGet($key);
    }
}
