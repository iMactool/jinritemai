<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Jinritemai\Core;

class ContainerBase extends Container
{
    /**
     * @var array
     */
    protected $provider = [];


    public function __construct()
    {

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
